<script type="text/javascript">
        $(document).ready(function () {
            var DataOrganizationStructure = new $.jqx.dataAdapter(Sources.SourceOrganizationStructure);
            $('#StructureGrid').jqxTree({ source: DataOrganizationStructure, height: '300px', width: '300px'});
        });
</script>

<div id="StructureGrid"></div>



