<?php
/*ID: 602110197
Name: Yuqin Zhou(Ice)
Wechat: blue*/
$f=fopen($_SERVER['argv'][1], 'r');
fscanf($file,"%d",$n);
$students=[];
for ($i=0;$i<$n;$i++){
$student=[];
fscanf ($file, "%s %s %f %f", $student['name'], $student['section'], $student['chap1'], $student['chap2']);
$student['total']=$student['chap1']+$student['chap2'];
$students[]=$student;
}
fclose($file);

foreach ($students as $key => $value){
    printf("%-11s%3s: %7.2f%7.2f =%7.2f\n", $value['name'], $value['section'], $value['chap1'], $value['chap2'], $value['total']);
}

$avg=array_reduce($students,function($carry,$student){
    $carry+=$student['total'];
    return $carry;},0)/$n;
printf("Average total score :%7.2f\n",$avg);

$selection=array_filter($students, function($student) use ($avg){
    return $student['total']>=$avg;
});
$sum=array_reduce($selection, function($carry,$student){
$carry += $student['total'];
return $carry;
},0);
printf("Summation of total score greater than or equal%7.2f :%7.2f", $avg, $sum);