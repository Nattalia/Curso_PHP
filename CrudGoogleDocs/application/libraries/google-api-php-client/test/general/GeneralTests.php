<?php
/*
 * Copyright 2010 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

//require_once "AuthTest.php";
require_once 'BaseTest.php';
require_once "../../../public/google-api-php-client/test/general/CacheTest.php";
require_once "../../../public/google-api-php-client/test/general/IoTest.php";
require_once "../../../public/google-api-php-client/test/general/ServiceTest.php";
require_once "../../../public/google-api-php-client/test/general/ApiModelTest.php";
require_once "../../../public/google-api-php-client/test/general/AuthTest.php";
require_once "../../../public/google-api-php-client/test/general/RestTest.php";
require_once "../../../public/google-api-php-client/test/general/ApiBatchRequestTest.php";
require_once "../../../public/google-api-php-client/test/general/ApiClientTest.php";
require_once "../../../public/google-api-php-client/test/general/ApiCacheParserTest.php";
require_once "../../../public/google-api-php-client/test/general/ApiMediaFileUploadTest.php";
require_once "../../../public/google-api-php-client/test/general/ApiOAuth2Test.php";

class GeneralTests extends PHPUnit_Framework_TestSuite {

  public static function suite() {
    $suite = new PHPUnit_Framework_TestSuite('Google API PHP Library core component tests');
    $suite->addTestSuite('AuthTest');
    $suite->addTestSuite('CacheTest');
    $suite->addTestSuite('IoTest');
    $suite->addTestSuite('ServiceTest');
    $suite->addTestSuite('ApiBatchRequestTest');
    $suite->addTestSuite('ApiClientTest');
    $suite->addTestSuite('ApiOAuth2Test');
    $suite->addTestSuite('ApiCacheParserTest');
    $suite->addTestSuite('ApiMediaFileUploadTest');
    $suite->addTestSuite('RestTest');
    return $suite;
  }
}