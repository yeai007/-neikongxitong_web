<?php

/**
 * @author  PVer
 * @date    2018-4-13 14:03:11
 * @version V1.0
 * @desc    
 */
require("../../../common.php");
$type = _post("type");
$perId = _post("perId");
$busId = _post("busId");
$perName = _post("perName");
$busName = _post("busName");
$val = _post("val");
require DT_ROOT . '/Class/AchProportionClass.php';
$info = new AchProportionClass();
if ($type == "modify") {
    if (!$info->checkInfo($perId, $busId)) {
        //不存在
        $arr = array();
        $arr["PerformanceLevelId"] = $perId;
        $arr["PerformanceLevelName"] = $perName;
        $arr["BusTypeId"] = $busId;
        $arr["BusTypeName"] = $busName;
        $arr["Proportion"] = $val;
        $result = $info->insertInfo($arr);
        if ($result > 0) {
            echo returnResult("修改成功-1", 1);
        } else {
            echo returnResult("修改失败-1", 1);
        }
    } else {
        $info->setInfoByDId($perId, $busId);
        $arr = array();
        $arr["PerformanceLevelId"] = $perId;
        $arr["PerformanceLevelName"] = $perName;
        $arr["BusTypeId"] = $busId;
        $arr["BusTypeName"] = $busName;
        $arr["Proportion"] = $val;
        $result = $info->updateInfo($arr);
        if ($result > -1) {
            echo returnResult("修改成功-2", 1);
        } else {
            echo returnResult("修改失败-2", 1);
        }
    }
    exit();
}
