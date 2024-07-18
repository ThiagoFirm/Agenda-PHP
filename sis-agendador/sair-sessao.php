<?php
session_start();
session_unset(); //remove as variaveis da sessao atual
session_destroy();