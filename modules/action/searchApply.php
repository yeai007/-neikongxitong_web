<?php

require("../../common.php");
require (DT_ROOT . "/data/dbClass.php"); //包含配置信息.
header("Content-Type:text/html;charset=UTF-8");
$pro_code = _post("procode");
$UintId = _post("unitid");
$result = $db->row("select e.Id,a.ProjectId, a.ProjectCode,a.ProjectName,b.UnitName,b.UnitId,d.UserName MarketPersonName,
(select sum(ChargeAmount)  from studentinfo where ProjectCode =a.ProjectCode and UnitId=b.UnitId) ReceiveAmount,
(select sum(ThisAmount) from applyinvoice where ProCode =a.ProjectCode and UnitId=b.UnitId) InvoicedAmount,
(select sum(PaymentAmount) from payment where ProCode =a.ProjectCode and UnitId=b.UnitId) PaymentAmount
from projectsinfo a
left join studentinfo b on a.ProjectCode=b.ProjectCode
left join customerinfo c on b.UnitId=c.CustomerId
left join users d on c.MarketPerson=d.UserId
left join applyinvoice e on a.ProjectCode=e.ProCode and b.UnitId=e.UnitId
where a.ProjectCode=$pro_code and b.UnitId=$UintId 
group by b.UnitName,b.UnitId");
echo urldecode(json_encode(url_encode($result)));
?>