<?php
return [
	"^\/(?P<controllerName>task)\/(?P<action>[a-zA-Z0-9]+)\/?(?P<id>[0-9]+)?$",
	"^\/(?P<controllerName>auth)\/(?P<action>[a-zA-Z]+)$",
	"^\/(?P<admin>admin)\/?(?P<controller>[a-z-]+)?\/?(?P<action>[a-z-]+)?\/?(?P<id>[0-9]+)?$"
];