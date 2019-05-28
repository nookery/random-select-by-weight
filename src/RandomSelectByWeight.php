<?php
/**
 * 根据权重/概率输出一个值
 */

class RandomSelectByWeight
{
    /**
     * 候选人数组
     *
     * @var array
     */
    private $candidates = [];

    /**
     * 设置候选人数组
     *
     * @param array $candidates
     * @return $this
     */
    public static function setCandidates($candidates = [])
    {
        /* 候选人数组示例 */
        // $candidates = array(
        //     array(
        //         'name' => 'candidate1',
        //         'weight' => '60',
        //     ),
        //     array(
        //         'name' => 'candidate2',
        //         'weight' => '40'
        //     )
        // );
        $instance = new self();
        $instance->candidates = $candidates;

        return $instance;
    }

    /**
     * 根据概率选择一个值
     *
     * @return string
     */
    public function select()
    {
        if (empty($this->candidates)) {
            return false;
        }

        $result = '';
        $sum = 0;

        // 概率数组的总概率精度
        foreach ($this->candidates as $candidate) {
            $sum += $candidate['weight'];
        }

        $randNum = mt_rand(1, $sum);
        // 概率数组循环
        foreach ($this->candidates as $key => $value) {
            if ($randNum <= $value['weight']) {
                $result = $value['name']; // 得出结果
                break;
            } else {
                $randNum -= $value['weight'];
            }
        }
        unset ($candidates);
        return $result;
    }
}
