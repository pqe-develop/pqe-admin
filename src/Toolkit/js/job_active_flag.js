handleflag_job_activeClick(document.getElementById('flag_job_active'));
function handleflag_job_activeClick(cb){
    if(cb.checked){
      document.getElementById('job_end_date').value = '';
      document.getElementById('job_end_date').readOnly = true;
    }else{
      document.getElementById('job_end_date').readOnly = false;
    }
    }