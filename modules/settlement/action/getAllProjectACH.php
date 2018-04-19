<?php

/**
 * @author  PVer
 * @date    2018-4-13 9:02:04
 * @version V1.0
 * @desc    
 */
if (!session_id()) {
    session_start();
}
if (!isset($_SESSION['user'])) {
    $_SESSION['userurl'] = $_SERVER['REQUEST_URI'];
    header("location:../login.php?"); //重新定向到其他页面
    exit();
} else {
    $user = $_SESSION['user'][0];
}
$userid = $user["UserId"];
require( "../../../common.php");
require (DT_ROOT . "/data/dbClass.php");
$pagetype = _post("pagetype");
$data = array();
$list = "select bb.Id,aaa.*,bb.AccountPerson,bb.AccountPersonId,bb.AccountStatus from (select aa.*,((aa.PublicAmount/aa.StuCount)*aa.StuCountUnit+20*aa.StuCountUnit) PublicAmountFT,
(aa.ReceiveAmount-PersonalAmount-((aa.PublicAmount/aa.StuCount)*aa.StuCountUnit+20*aa.StuCountUnit))*aa.Proportion/100 AmountACH
from (select a.ProjectId,a.ProjectCode,a.ProjectName,b.BusTypeName,
(select sum(ChargeAmount)  from studentinfo where ProjectCode =a.ProjectCode) ReceiveAmount,
(select sum(GrantAmount) from reimbursement where ReimType=2 and ProCode=a.ProjectCode) PersonalAmount,
(select sum(GrantAmount) from reimbursement where ReimType=3 and ProCode=a.ProjectCode) PublicAmount,
(select count(*) from studentinfo where ProjectCode=a.ProjectCode) StuCount,
d.UnitName,(select count(*) from studentinfo where UnitName=d.UnitName) StuCountUnit,h.Proportion,e.CustomerContact,a.BusType,d.UnitId
from projectsinfo a
left join bustype b on a.BusType=b.Id
left join studentinfo d on a.ProjectCode=d.ProjectCode
left join customerinfo e on d.UnitId=e.CustomerId
left join achproportion h on e.PerformanceLevel=h.PerformanceLevelId and a.BusType=h.BusTypeId  GROUP BY UnitName,UnitId
) aa) aaa
left join projectachievements bb on aaa.ProjectCode=bb.ProCode and aaa.UnitId=bb.UnitId";
//$list = "select * from expenditure ";
$data["list"] = $db->query($list);
$data["pagetype"] = $pagetype;
echo $twig->render('settlement/project_ach_list.twig', $data);

