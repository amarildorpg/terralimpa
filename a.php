<?php
session_start();
require 'php/conn.php';
require_once "pagseguro-php-sdk-master/vendor/autoload.php";

\PagSeguro\Library::initialize();
\PagSeguro\Library::cmsVersion()->setName("Nome")->setRelease("1.0.0");
\PagSeguro\Library::moduleVersion()->setName("Nome")->setRelease("1.0.0");
try {

  $credentials = PagSeguroConfig::getAccountCredentials(); // getApplicationCredentials()
  $response = PagSeguroTransactionSearchService::searchByReference(
    $credentials,
    $reference,
    $initialDate,
    $finalDate,
    $pageNumber,
    $maxPageResults
  );

} catch (PagSeguroServiceException $e) {
  die($e->getMessage());
}  

?>
