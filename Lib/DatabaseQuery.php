<?php
/**
* ----------------------------------------------------------
* API DATABASE
* Class DatabaseQuery
* @return Funciones de conexion con la base de datos
* @version 1.0
* @package Lib
* @author Jose Antonio Campos Urquijo
* @copyright  Copyright (c)
* ----------------------------------------------------------
*/

class DatabaseQuery
{
	private $_config;
	private $_headers;
	private $_lang;
	private $_error;
	public $database;
	public $query;

	public function __construct($config, $headers, $lang)
	{
		$this->_config = $config;
		$this->_headers = $headers;
		$this->_lang = $lang;
		$this->_error = new ErrorDBModel();
	}

	#region public methods

	public function All(mixed $params, string $typeResult)
	{
		$typeResult = $typeResult == 'num' ? PDO::FETCH_NUM : PDO::FETCH_ASSOC;

		try 
		{
			$connection = $this->connection($this->database);

			if(isset($connection->error))
			{
				throw new Exception($connection->msg);
			}

			$result = $connection->prepare($this->query);
			$result->execute($params);
			$data = $result->fetchall($typeResult);
			$rowCount = $result->rowCount();
			$columnCount = $result->columnCount();
			
			/* Get columns from query */
			for ($i = 0; $i < $columnCount; $i ++) 
			{
	    		$getColumnMeta = $result->getColumnMeta($i);
	    		$columnName[] = $getColumnMeta['name'];
			}

			$result->closeCursor();

			return [
				'data' => !empty($data) ? $data : null,
				'columnCount' => $columnCount,
				'columnName' => $columnName,
				'recordsReturned' => $rowCount,
				'tableRecordsQuantity' => 0,
				'limit' => 0
			];
		} 
		catch(Exception $e) 
		{
			if(!empty($connection->msg)) throw new Exception($connection->msg, 500);
			$this->SetError($e);
			$this->FileError();
			throw new Exception($this->_error->folder.'/'.$this->_error->hashError, 500);
	    } 
	    finally 
	    {
	    	$result = null;
			$connection = null;
	    }
	}

	public function Row(mixed $params, string $typeResult)
	{
		$typeResult = $typeResult == 'num' ? PDO::FETCH_NUM : PDO::FETCH_ASSOC;

		try 
		{
			// Se agrega la instruccion limit 1 en caso de no tenerla.
			$strQuery = !strpos($this->query, 'LIMIT') ? $this->query." LIMIT 1" : $this->query;

			// Ejecucion del query
			$connection = $this->connection($this->database);
			$result = $connection->prepare($strQuery);
			$result->execute($params);

			// Retorno de datos 
			$data = $result->fetch($typeResult);
			$columnCount = $result->columnCount();
			for ($i = 0; $i < $columnCount; $i ++) 
			{
	    		$getColumnMeta = $result->getColumnMeta($i);
	    		$columnName[] = $getColumnMeta['name'];
			}

			switch ($typeResult) 
			{
				case PDO::FETCH_NUM:
					return $data;
					break;
				
				default:
					return [
						'data' => !empty($data) ? $data : null,
						'columnCount' => $columnCount,
						'columnName' => $columnName
					];
					break;
			}
		} 
		catch(Exception $e) 
		{
			if(!empty($connection->msg)) throw new Exception($connection->msg, 500);
			$this->SetError($e);
			$this->FileError();
			throw new Exception($this->_error->folder.'/'.$this->_error->hashError, 500);
	    } 
	    finally 
	    {
	    	$result = null;
			$connection = null;
	    }
	}

	public function Value(mixed $params)
	{
		$result = $this->Row($params, 'num', $this->database);
		return !empty($result[0]) ? $result[0] : null;
	}

	public function Column(string $column)
	{
		$connection = $this->connection($this->database);
		$result = $connection->prepare($this->query);
		$result->execute();
		$data = $result->fetchall(PDO::FETCH_ASSOC);
	
		foreach($data as $key => $value)
		{
			$data[$key] = $value[$column];
		}

		return $data;
	}

	public function Insert(mixed $params, string $table)
	{
		$queryType = 'IN';

		try 
		{
			if(stripos($this->query, 'insert') != false)
			{
				throw new Exception(str_replace('{{query}}','insert',$this->_lang->wrong_query_type), 500);
			}

			if(!stripos($this->query, $table))
			{
				throw new Exception($this->_lang->wrong_table_query, 500);
			}

			$connection = $this->connection($this->database);
			
			// Se define la variable @UseId para efectos del trigger.
			$this->setUser();

			// Se ejecuta la consulta principal.
			$insert = $connection->prepare($this->query);
			$result = $insert->execute($params);
			$insert->closeCursor();

			$this->LogAfterChange($insert->rowCount(), $queryType, $table, $params);

			// cantidad de registros insertados
			return ['InsertedRecords' => $insert->rowCount()];
		} 
		catch(Exception $e) 
		{
			if(!empty($connection->msg)) throw new Exception($connection->msg, 500);
			$this->SetError($e);
			$this->FileError();
			throw new Exception($this->_error->folder.'/'.$this->_error->hashError, 500);
	    } 
	    finally 
	    {
	    	$insert = null;
	    	$result = null;
			$connection = null;
	    }
	}

	public function Update(mixed $params, string $table)
	{
		$queryType = 'UP';

		try 
		{
			if(stripos($this->query, 'update') != false)
			{
				throw new Exception(str_replace('{{query}}','update',$this->_lang->wrong_query_type), 500);
			}

			if(!stripos($this->query, $table))
			{
				throw new Exception($this->_lang->wrong_table_query, 500);
			}

			$connection = $this->connection($this->database);

			// Se define la variable @UseId para efectos del trigger.
			$this->setUser();
		
			// Se ejecuta la consulta principal.
			$update = $connection->prepare($this->query);
			$result = $update->execute($params);
			$update->closeCursor();
	
			$this->LogAfterChange($update->rowCount(), $queryType, $table, $params);

			return ['UpdatedRecords' => $update->rowCount()];
		} 
		catch(Exception $e) 
		{
			if(!empty($connection->msg)) throw new Exception($connection->msg, 500);
			$this->SetError($e);
			$this->FileError();
			throw new Exception($this->_error->folder.'/'.$this->_error->hashError, 500);
	    } 
	    finally 
	    {
	    	$result = null;
			$connection = null;
	    }
	}

	public function Delete(mixed $params, string $table)
	{
		$queryType = 'DE';

		try 
		{
			if(stripos($this->query, 'delete') != false)
			{
				throw new Exception(str_replace('{{query}}','delete',$this->_lang->wrong_query_type), 500);
			}

			if(!stripos($this->query, $table))
			{
				throw new Exception($this->_lang->wrong_table_query, 500);
			}

			$connection = $this->connection($this->database);

			// Se define la variable @UseId para efectos del trigger.
			$this->setUser();
			
			// Se ejecuta la consulta principal.
			$delete = $connection->prepare($this->query);
			$result = $delete->execute($params);

			$delete->closeCursor();

			$this->LogAfterChange($delete->rowCount(), $queryType, $table, $params);

			return ['DeletedRecords' => $delete->rowCount()];
		} 
		catch(Exception $e) 
		{
			if(!empty($connection->msg)) throw new Exception($connection->msg, 500);
			$this->SetError($e);
			$this->FileError();
			throw new Exception($this->_error->folder.'/'.$this->_error->hashError, 500);
	    } 
	    finally 
	    {
	    	$result = null;
			$connection = null;
	    }
	}

	public function StoreProcedure(string $SPName, string $parameters, string $database):mixed
	{		
		$sql = "CALL `{$SPName}`({$parameters});";
		
		$connection = $this->connection($database);

		$stmt = $connection->prepare($sql);

		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	#endregion

	#region private methods

	private function connection() 
	{
		$database = empty($this->database) ? 'db1' : $this->database;
		$server = $this->_config->$database->server;
		$dbname = $this->_config->$database->dbname;
		$user = $this->_config->$database->user;
		$pw = $this->_config->$database->pw;
		$charset = $this->_config->$database->charset;
		$this->_error->motorDB = $this->_config->$database->motor;

		// Conexion con la base de datos de acuerdo al tipo de motor de base de datos
		try 
		{
			switch ($this->_config->$database->motor) 
			{
				case 'sqlsrv':
					$connection = new PDO("SQLSrv:Server={$server}\\SQLEXPRESS;Database={$dbname}", $user, $pw);
					break;
					
				case 'mysql':
					$connection = new PDO("mysql:host={$server};dbname={$dbname}", $user, $pw, [PDO::MYSQL_ATTR_LOCAL_INFILE => true]);
					break;

				default:
					throw new Exception($this->_lang->unselect_motordb, 500);
					break;
			}

			$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$connection->exec("SET CHARACTER SET {$charset}");

			return $connection;
		} 
		catch (Exception $e) 
		{
			$connection = new stdClass();
			$connection->error = true;
			$connection->msg = $e->getMessage();
			return $connection;
		}
	}

	private function RegisterLogDB(mixed $params, string $queryType, string $table):void
	{
		$data = [
			':SqlQueryType'=>$queryType, 
			':SqlTable'=>$table, 
			':SqlUser'=>$this->_headers['user'], 
			':SqlQuery'=>addslashes($this->query.$params), 
			':SqlIp'=>$this->_headers['ip']
		];
		$sql = "INSERT INTO sqllog (SqlQueryType, SqlTable, SqlUser, SqlQuery, SqlIp, created_at) VALUES (:SqlQueryType, :SqlTable, :SqlUser, :SqlQuery, :SqlIp, now());";
		$connection = $this->connection('db2');
		$result = $connection->prepare($sql);
		$result->execute($data);
		$result->closeCursor();
	}

	private function setUser():void
	{
		$connection = $this->connection($this->database);
		if(!empty($this->_headers->user))
		{
			$sql = "set @UseId='{$this->_headers->user}';";
			$result = $connection->prepare($sql);
			$result->execute();
			$result->closeCursor();
		}
	}

	private function SetError(Exception $exception):void
	{
		$this->_error->message = $exception->getMessage();
		$this->_error->line = $exception->getLine();
		$this->_error->file = $exception->getFile();
		$this->_error->code = $exception->getCode();
		$this->_error->trace = $exception->getTrace();
		$this->_error->hashError = uniqid();
		$this->_error->database = $this->database;
		$this->_error->query = $this->query;
		$this->_error->folder = date($this->_config->Logs->FormatDateFile);
		$this->_error->datetime = date("Y-m-d-h-i-s");
	}

	private function FileError():void
	{
		if($this->_config->Logs->createFileLogErrorDB)
	        Logs::RegisterLogFile($this->_config, $this->_error);
	}

	private function LogAfterChange(int $count, string $queryType, string $table, mixed $params):void
	{
		if($this->_config->Logs->createFileLogAfterChange && $count > 0)
			Logs::RegisterQuery($this->_config, $queryType.'_'.$table, $this->query.json_encode($params));

		if($this->_config->Logs->createSQLLogAfterChange && $count > 0)
			$this->RegisterLogDB(json_encode($params), $queryType, $table);		
	}

	#endregion
}