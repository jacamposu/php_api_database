<?php

class OptionEditModel
{
	public $type;
	public $buttonName;
	public $event;
	public $params;
	public $title;
	public $color;
	public $icon;
	public $group;
	public $url;
	public $groupMessage;

	public function __construct(string $url, string $groupMessage)
	{
		$this->url = $url;
		$this->groupMessage = $groupMessage;
	}

	public function SetType(string $type='modal')
	{
		$this->type = $type;
		return $this;
	}

	public function SetButtonName(string $message, string $group=NULL)
	{
		$this->buttonName = ['group' => is_null($group) ? $this->groupMessage : $group, 'message' => $message];
		return $this;
	}

	public function SetEvent(string $event)
	{
		$this->event = $event;
		return $this;
	}

	public function SetParams(string $url, array $arrayTitle, array $arrayMessage)
	{
		$this->params = new ParamsModel();
		$this->params->action = $this->url.$url;
		$this->params->title = ['group' => $arrayTitle[0], 'message' => $arrayTitle[1]];
		$this->params->msg = ['group' => $arrayMessage[0], 'message' => $arrayMessage[1]];
		return $this;
	}

	public function SetTitle(string $message, string $group=NULL)
	{
		$this->title = ['group' => is_null($group) ? $this->groupMessage : $group, 'message' => $message];
		return $this;
	}

	public function SetColor(string $color)
	{
		$this->color = $color;
		return $this;
	}

	public function SetIcon(string $icon)
	{
		$this->icon = $icon;
		return $this;
	}

	public function SetGroup(string $group='')
	{
		$this->group = $group;
		return $this;
	}

	public function SetUrl(string $url)
	{
		$this->url = $url;
		return $this;
	}

	public function SetParam(string $param)
	{
		$this->params = $param;
		return $this;
	}

	public function decode()
	{
		return json_decode(json_encode($this), true);
	}
}

class ParamsModel
{
	public $action;
	public $title;
	public $msg;
}