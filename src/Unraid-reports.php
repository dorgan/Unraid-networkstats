<?
set_error_handler("log_error");
set_exception_handler( "log_exception" );
$plugin = "unraid-reports";
require_once( "webGui/include/Helpers.php" );

function log_error($errno, $errstr, $errfile, $errline)
{
  switch($errno){
    case E_ERROR:               $error = "Error";                          break;
    case E_WARNING:             $error = "Warning";                        break;
    case E_PARSE:               $error = "Parse Error";                    break;
    case E_NOTICE:              $error = "Notice";                 return; break;
    case E_CORE_ERROR:          $error = "Core Error";                     break;
    case E_CORE_WARNING:        $error = "Core Warning";                   break;
    case E_COMPILE_ERROR:       $error = "Compile Error";                  break;
    case E_COMPILE_WARNING:     $error = "Compile Warning";                break;
    case E_USER_ERROR:          $error = "User Error";                     break;
    case E_USER_WARNING:        $error = "User Warning";                   break;
    case E_USER_NOTICE:         $error = "User Notice";                    break;
    case E_STRICT:              $error = "Strict Notice";                  break;
    case E_RECOVERABLE_ERROR:   $error = "Recoverable Error";              break;
    default:                    $error = "Unknown error ($errno)"; return; break;
  }
  debug("PHP {$error}: $errstr in {$errfile} on line {$errline}");
}

unction log_exception( $e )
{
  debug("PHP Exception: {$e->getMessage()} in {$e->getFile()} on line {$e->getLine()}");
}
function debug($msg, $type = "NOTICE")
{
  if ( $type == "DEBUG" && ! $GLOBALS["VERBOSE"] )
  {
    return NULL;
  }
  $msg = "\n".date("D M j G:i:s T Y").": ".print_r($msg,true);
  file_put_contents($GLOBALS["log_file"], $msg, FILE_APPEND);
}
