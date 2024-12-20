jQuery('#demo-importer-form').on('submit', function (e) {
  e.preventDefault();
  if(confirm("Are you sure for demo import ?")){
    var url = new URL(location.href);
    url.searchParams.append('import-demo', true);
    location.href = url;
  }
  else {
    return false;
  }
})