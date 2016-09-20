<?php


namespace AppBundle\Worker;


use Mmoreram\GearmanBundle\Command\Util\GearmanOutputAwareInterface;
use Mmoreram\GearmanBundle\Driver\Gearman;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * product export worker
 * spawn me how many you want!
 *
 * @Gearman\Work(
 *     service="app.generator_worker"
 * )
 */
class GeneratorWorker implements GearmanOutputAwareInterface
{
    /**
     * @var OutputInterface
     */
    protected $output;

    /**
     * @param \GearmanJob $job
     * @Gearman\Job()
     * @return string
     */
    public function process(\GearmanJob $job)
    {
        $data = unserialize($job->workload());

        $this->output->writeln(
            var_export($data)
        );

    }

    /**
     * Set the output handler
     *
     * @param OutputInterface $output
     */
    public function setOutput(OutputInterface $output)
    {
        $this->output = $output;
    }
}
