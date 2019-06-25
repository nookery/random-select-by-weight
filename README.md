Random Select by Weight
---------

根据权重/概率输出一个值

## 使用

```
RandomSelectByWeight->setCandidates([
  [
    'name' => 'candidate1',
    'weight' => '60',
  ],
  [
    'name' => 'candidate2',
    'weight' => '40'
  ]
])->select()
```
