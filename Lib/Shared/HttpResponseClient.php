<?php

/**
 * @var 200 OK: Respuesta estándar para solicitudes HTTP exitosas. La respuesta real dependerá del método de solicitud utilizado. En una solicitud GET, la respuesta contendrá una entidad correspondiente al recurso solicitado. En una solicitud POST, la respuesta contendrá una entidad que describa o contenga el resultado de la acción.
 * @var 201 CREATED: La solicitud se cumplió, lo que resultó en la creación de un nuevo recurso.
 * @var 202 ACCEPTED: La solicitud ha sido aceptada para su procesamiento, pero el procesamiento no se ha completado. La solicitud puede o no ser atendida eventualmente, y puede ser rechazada cuando ocurre el procesamiento.
 * @var 400 BAD REQUEST: El servidor no puede o no procesará la solicitud debido a un aparente error del cliente (p. ej., sintaxis de solicitud mal formada, tamaño demasiado grande, marco de mensaje de solicitud no válido o enrutamiento de solicitud engañoso).
 * @var 401 UNAUTHORIZED: Similar a 403 Prohibido, pero específicamente para usar cuando se requiere autenticación y ha fallado o aún no se ha proporcionado. La respuesta debe incluir un campo de encabezado WWW-Authenticate que contenga un desafío aplicable al recurso solicitado. 
 * @var 402 FORBIDDEN: La solicitud contenía datos válidos y el servidor la entendió, pero el servidor rechaza la acción. Esto puede deberse a que el usuario no tiene los permisos necesarios para un recurso o necesita una cuenta de algún tipo, o intenta una acción prohibida (por ejemplo, crear un registro duplicado donde solo se permite uno). Este código también se usa normalmente si la solicitud proporcionó autenticación respondiendo al desafío del campo de encabezado WWW-Authenticate, pero el servidor no aceptó esa autenticación. La solicitud no debe repetirse.
 * @var 403 NOT FOUND: No se pudo encontrar el recurso solicitado, pero es posible que esté disponible en el futuro. Se permiten solicitudes posteriores por parte del cliente.
 * @var 404 METHOD NOT ALLOWED: No se admite un método de solicitud para el recurso solicitado; por ejemplo, una solicitud GET en un formulario que requiere que los datos se presenten a través de POST o una solicitud PUT en un recurso de solo lectura.
 * @var 408 REQUEST TIMEOUT: El servidor agotó el tiempo de espera de la solicitud. De acuerdo con las especificaciones de HTTP: "El cliente no produjo una solicitud dentro del tiempo que el servidor estaba preparado para esperar. El cliente PUEDE repetir la solicitud sin modificaciones en cualquier momento posterior". 
 * @var 500 INTERNAL SERVER ERROR: Un mensaje de error genérico, dado cuando se encontró una condición inesperada y no es adecuado un mensaje más específico.
 */


class HttpResponseClient
{
    private ResponseModel $response;

    public function __construct()
    {
        $this->response = new ResponseModel();
    }

    public function Response(int $httpCode=400, mixed $data=null):void
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Allow: GET, POST, PUT, DELETE");
        header('Content-Type: application/json');
        http_response_code($httpCode);
        $this->SetResponse($data, $httpCode);
        die(json_encode($this->response));
    }


    public function VerifyMethod(string $method):void
    {
        if($_SERVER['REQUEST_METHOD'] != $method)
        {
            throw new Exception("failedMethod",405);
        }
    }

    
    private function SetResponse(mixed $data=null, int $code=400):void
    {
        $this->response->description = $this->DescriptionErrorCode($code);
        $this->response->statusCode = $code;
        $this->response->result = $data;
    }


    private function DescriptionErrorCode(int $code):string
    {
        $arrayCodes = [
            100 => 'CONTINUE',
            101 => 'SWITCHING PROTOCOLS',
            102 => 'PROCESSING',
            103 => 'EARLY HINTS',
            200 => 'OK',
            201 => 'CREATED',
            202 => 'ACCEPTED',
            203 => 'NON-AUTHORITATIVE INFORMATION',
            204 => 'NO CONTENT',
            205 => 'RESET CONTENT',
            206 => 'PARTIAL CONTENT',
            207 => 'MULTI-STATUS',
            208 => 'ALREADY REPORTED',
            226 => 'IM USED',
            300 => 'MULTIPLE CHOICES',
            301 => 'MOVED PERMANENTLY',
            302 => 'FOUND',
            303 => 'SEE OTHER',
            304 => 'NOT MODIFIED',
            307 => 'TEMPORARY REDIRECT',
            308 => 'PERMANENT REDIRECT',
            400 => 'BAD REQUEST',
            401 => 'UNAUTHORIZED',
            402 => 'PAYMENT REQUIRED',
            403 => 'FORBIDDEN',
            404 => 'NOT FOUND',
            405 => 'METHOD NOT ALLOWED',
            406 => 'NOT ACCEPTABLE',
            407 => 'PROXY AUTHENTICATION REQUIRED',
            408 => 'REQUEST TIMEOUT',
            409 => 'CONFLICT',
            410 => 'GONE',
            411 => 'LENGTH REQUIRED',
            412 => 'PRECONDITION FAILED',
            413 => 'PAYLOAD TOO LARGE',
            414 => 'URI TOO LONG',
            415 => 'UNSUPPORTED MEDIA TYPE',
            416 => 'RANGE NOT SATISFIABLE',
            417 => 'EXPECTATION FAILED',
            418 => 'IM A TEAPOT',
            421 => 'MISDIRECTET REQUEST',
            422 => 'UNPROCESSABLE CONTENT',
            423 => 'LOCKED',
            424 => 'FAILED DEPENDENCY',
            425 => 'TOO EARLY',
            426 => 'UPGRADE REQUIRED',
            427 => 'UPGRADE REQUIRED',
            428 => 'PRECONDITION REQUIRED',
            429 => 'TOO MAY REQUEST',
            431 => 'REQUEST HEADER FIELDS TOO LARGE',
            451 => 'UNAVAILABLE FOR LEGAL REASONS',
            500 => 'INTERNAL SERVER ERROR',
            501 => 'NOT IMPLEMENTED',
            502 => 'BAD GATEWAY',
            503 => 'SERVICE UNAVAILABLE',
            504 => 'GATEWAY TIMEOUT',
            505 => 'HTTP VERSION NOT SUPPORTED',
            506 => 'VARIANT ALSO NEGOTIATES',
            507 => 'INSUFFICIENT STORAGE',
            508 => 'LOOP DETECTED',
            510 => 'NOT EXTENDED',
            511 => 'NETWORK AUTHENTICATION REQUIRED'
        ];
        
        return isset($arrayCodes[$code]) ? $arrayCodes[$code] : '';
    }
}