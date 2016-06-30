globParam = {
    strg_id: location.href.match(/\/?\S*strg_id=([\w]*)/)[1],
    id: location.href.match(/\/?\S*id=([\w]*)/)[1],
}

var strg_id = location.href.match(/\/?\S*strg_id=([\w]*)/)[1]
var id = location.href.match(/\/?\S*id=([\w]*)/)[1]

var equipInfo = {
    model: 'WHDocuments',
    docm_id: id,
    dt_id: null,
    params: {
        actions: {
            getEquipInfo: {
                strg_id: strg_id,
                equip_id: null,
            },

        },
    },

};

var equipHistory = {
    model: 'WHDocuments',
    params: {
        actions: {
            getHistoryEquip: {
                docm_id: id,
                dt_id: null,
            },

        },
    },

};
getEquipInfo = function (id) {
    equipInfo.Id = equipInfo.params.actions.getEquipInfo.equip_id = id

    var response;

    $.ajax({
        url: '/?r=ajaxData/GetDataa',
        method: 'post',
        dataType: 'json',
        data: equipInfo,
        async: false,

        success: function(r) {
            response = r

        },
        error: function () {
            response = false
        },
    })

    return response
}


getHistory = function() {
    $.ajax({
        url: '/?r=ajaxData/GetDataa',
        data: equipHistory,
        dataType: 'json',
        method: 'post',
        success: function(){

        }
    })
}