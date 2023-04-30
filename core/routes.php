<?php
return [
	"^\/(?P<controllerName>task)\/(?P<action>[a-zA-Z0-9]+)\/?(?P<id>[0-9]+)?$",
	"^\/(?P<controllerName>main)\/(?P<action>[a-zA-Z0-9]+)\/?(?P<id>[0-9]+)?$",
	"^\/(?P<admin>admin)\/?(?P<controller>[a-z-]+)?\/?(?P<action>[a-z-]+)?\/?(?P<id>[0-9]+)?$"
];