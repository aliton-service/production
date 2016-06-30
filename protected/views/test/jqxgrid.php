<style>
        body, html {
            width: 100%;
            height: 100%;
            overflow: hidden;
            padding: 3px;
            box-sizing: border-box;
            margin: 0;
        }
    </style>
<script type="text/javascript">
    $(document).ready(function () {
        var url = "http://aliton/index.php?r=Test/jqxGridData";
        // prepare the data
        var source =
        {
            datatype: "json",
            datafields: [
                { name: 'Object_id' },
                { name: 'Addr' },
                { name: 'MasterName'},
            ],
            id: 'id',
            url: url,
            root: 'Rows',
            cache: false,
            pagenum: 10,
            pagesize: 300,
            beforeprocessing: function (data) {
                    console.log(data);
                    source.totalrecords = data[0].TotalRows;
                }
        };
        var dataAdapter = new $.jqx.dataAdapter(source);
        $("#jqxgrid").jqxGrid(
        {
            width: '800',
            height: '500',
            source: dataAdapter,
            showfilterrow: true,
            filterable: true,
            pageable: true,
            columnsresize: true,
            virtualmode: false,
            rendergridrows: function (params) {
                    return params.data;
                },
            columns: [
              { text: 'Object_id', dataField: 'Object_id', width: 200 },
              { text: 'Addr', dataField: 'Addr', width: 250 },
              { text: 'MasterName', dataField: 'MasterName', width: 180 },
            ]
        });
    });
</script>

    <div id="jqxgrid">
    </div>


