    <!-- Modal -->
<div class="modal fade" id="modal-container-detailedConfig" tabindex="-1" aria-labelledby="exampleModalLongTitle" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Detailed Config <b><span class="detailedConfig-containerName"></span></b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5>
            <b> On Host: </b> <span id="detailedConfig-currentHost"></span>
        </h5>
        <div id="detailedConfig-list">
            <pre id="detailedConfig-pre"></pre>
        </div>
        <br/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>

    var detailedContainerConfig = {
        hostId: null,
        container: null,
        alias: null
    }
    
    $("#modal-container-detailedConfig").on("shown.bs.modal", function(){
 
        if(!$.isPlainObject(detailedContainerConfig)){
            $("#modal-container-detailedConfig").modal("toggle");
            alert("required variable isn't right");
            return false;
        } else if(!$.isNumeric(detailedContainerConfig.hostId)) {
            $("#modal-container-detailedConfig").modal("toggle");
            alert("hostId isn't set");
            return false;
        } else if (typeof detailedContainerConfig.container !== "string") {  
            $("#modal-container-detailedConfig").modal("toggle");
            alert("container isn't set");
            return false;
        } 

        ajaxRequest(globalUrls.containers.getDetails, detailedContainerConfig, (data)=> {
            let details = $.parseJSON(data);
            $("#detailedConfig-pre").html(JSON.stringify(details, null, 2));
        });

        $(".detailedConfig-containerName").html(detailedContainerConfig.container);
        $("#detailedConfig-currentHost").html(detailedContainerConfig.alias);
    });

</script>
