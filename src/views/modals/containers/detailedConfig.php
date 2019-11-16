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

    $("#modal-container-detailedConfig").on("shown.bs.modal", function(){

        if(!$.isPlainObject(currentContainerDetails)){
            $("#modal-container-detailedConfig").modal("toggle");
            alert("required variable isn't right");
            return false;
        }else if(typeof currentContainerDetails.container !== "string"){
            $("#modal-container-detailedConfig").modal("toggle");
            alert("container isn't set");
            return false;
        }

        /*ajaxRequest(globalUrls.containers.getCurrentSettings, currentContainerDetails, function(data){
            data = $.parseJSON(data);
            if(data.existingSettings.length > 0){
                let existingSettingsHtml = "";
                $.each(data.existingSettings, function(i, item){
                    existingSettingsHtml += `<div style='margin-bottom: 5px; border-bottom: 1px solid black; padding: 10px;' class='input-group'>
                    <div class='col-md-4'>
                        <div class='input-group-prepend'>
                            <select name='key' class='form-control settingSelect' disabled='disabled' style='width: 100%'>
                                <option value='${item.key}' selected>${item.key}</option>
                             </select>
                            </div>
                    </div>
                    <div class='col-md-4'>
                        <div class='description'>${item.description}</div>
                    </div>
                    <div class='col-md-3'>
                        <input  style="width: 100%" type="text" name="value" value="${item.value}" class="form-control"/>
                    </div>
                    </div>`;
                });
                $("#detailedConfig-list").empty().append(existingSettingsHtml);
            }

            if(!$.isEmptyObject(data.remainingSettings)){
                reamingSettingSelectOptions += "<option value=''>Please Select</option>";
                $.each(data.remainingSettings, function(i, item){
                    reamingSettingSelectOptions += `<option
                        data-default='${item.value}'
                        data-description='${item.description}'
                        value='${item.key}'>
                            ${item.key}
                        </option>`;
                });
            }
        });*/

        $(".detailedConfig-containerName").html(currentContainerDetails.container);
        $("#detailedConfig-currentHost").html(currentContainerDetails.alias);
    });

</script>
