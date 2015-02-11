<?php
namespace IstDrupalApp;

class Terminus {

  protected $terminusVersion = array(
    'major' => 0,
    'minor' => 3,
    'patch' => 4,
  );

  public function __construct() {
    if (!$this->checkTerminusCommand()) {
      throw new \Exception('The command terminus was not found on this system.');
    }
    if (!$this->checkTerminusVersion()) {
      throw new \Exception(sprintf('A version of terminus greater than %d.%d.%d is required.', $this->terminusVersion['major'], $this->terminusVersion['minor'], $this->terminusVersion['patch']));
    }

  }

  protected function checkTerminusCommand() {
    exec('which terminus', $out, $return);
    if ($return !== 0) {
      return false;
    }
    return true;
  }

  protected function checkTerminusVersion() {
    exec('terminus cli version', $out, $return);
    if ($return !== 0) {
      return false;
    }
    $parts = explode(' ', $out[0]);
    $parts = explode('-', $parts[1]);
    $parts = explode('.', $parts[0]);
    if (($parts[0] < $this->terminusVersion['major']) || ($parts[1] < $this->terminusVersion['minor']) || ($parts[2] < $this->terminusVersion['patch'])) {
      return false;
    }
    return true;
  }
}
