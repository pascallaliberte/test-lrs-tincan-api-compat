<?php

use TinCan;

class CompletionDateTest extends PHPUnit_Framework_TestCase
{
  /**
   * @dataProvider completionDateProvider
   */
  public function testCompletionDate($agent_mbox, $activity_id, $expected_statement_id)
  {
    global $lrs;

    $response = $lrs->queryStatements([
      'agent' => new TinCan\Agent(['mbox' => 'mailto:'.$agent_mbox]),
      'verb' => new TinCan\Verb(['id' => 'http://adlnet.gov/expapi/verbs/passed']),
      'activity' => new TinCan\Activity(['id' => $activity_id]),
      'limit' => 1,
      'ascending' => 'true',
      'by_timestamp' => 'true',
      'include_agent_overrides' => 'true',
      'related_agents' => 'true',
    ]);

    $statements = $response->content->getStatements();

    # assert that there is at least one statement

    if ( is_null( $expected_statement_id ) ) {
      $this->assertCount(0, $statements);
    } else {
      $this->assertNotCount(0, $statements, 'There are zero statements returned');
      $this->assertExists($statements[0]);
      $this->assertInstanceOf('Tincan\Statement', $statements[0]);
      $this->assertTrue($statements[0]->hasID());
      $this->assertEquals($expected_statement_id, $statements[0]->getId());
    }
  }

  public function completionDateProvider()
  {
    global $yaml;
    $samples = $yaml->parse(file_get_contents(__DIR__ . '/' . '../samples/' . 'CompletionDate.yml'));
    return $samples['CompletionDate'];
  }
}
?>
