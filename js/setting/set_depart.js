/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    zTreeInit();
});
var setting = {
    data: {
        simpleData: {
            enable: true
        }
    },
    view: {
        selectedMulti: false
    },
    check: {
        enable: true
    },
    callback: {
        onClick: function (e, id, node) {
            var zTree = $.fn.zTree.getZTreeObj("treeDemo");
            if (node.isParent) {
                zTree.expandNode();
            } else {
                //addTabs(node.name, node.file);
            }
        }
    }
};
function toSub(obj)
{
    var zTree = $.fn.zTree.getZTreeObj("treeDemo");
    var checkedNodes = zTree.getCheckedNodes();
    console.log(JSON.stringify(checkedNodes));
    var menu_info = "";
    for (var i = 0; i < checkedNodes.length; i++) {
        if (i == 0)
        {
            if (checkedNodes[i]["checked"] == true) {
                menu_info = checkedNodes[i]["id"];
                for (var j = 0; j < checkedNodes[i]["children"].length; j++) {
                    if (checkedNodes[i]["children"][j]["checked"] == true) {
                        menu_info = menu_info + "," + checkedNodes[i]["children"][j]["id"];
                    }
                }
            }
        } else {
            if (checkedNodes[i]["pId"] == null) {
                if (checkedNodes[i]["checked"] == true) {
                    menu_info = menu_info + "," + checkedNodes[i]["id"];
                    for (var j = 0; j < checkedNodes[i]["children"].length; j++) {
                        if (checkedNodes[i]["children"][j]["checked"] == true) {
                            menu_info = menu_info + "," + checkedNodes[i]["children"][j]["id"];
                        }
                    }
                }
            } else {
                if (checkedNodes[i]["checked"] == true) {
                    menu_info = menu_info + "," + checkedNodes[i]["id"];
                }
            }
        }
    }

    $.post('../../modules/setting/action/actionDepart.php',
            {checkedNodes: menu_info,
                depart_name: $("#depart_name").val(),
                depart_desc: $("#depart_desc").val(),
                type: obj,
                id: $("#id").val()
            },
            function (data) {
                alert(data);
            });
}
function zTreeInit() {
    $.post('../../modules/setting/action/getDepartMenu.php', {id: $("#id").val()}, function (data) {
        var zTreeObj;
        var zNodes = eval(data);
        zTreeObj = $.fn.zTree.init($("#treeDemo"), setting, zNodes);
    });

}

