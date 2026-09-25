  </div>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"></script>
<script src="libs/js/functions.js"></script>
<script>
(function(){
  var sidebar=document.getElementById('sidebar');
  var overlay=document.querySelector('.sidebar-overlay');
  var toggle=document.querySelector('.mobile-menu-toggle');
  function closeNav(){ if(sidebar) sidebar.classList.remove('open'); if(overlay) overlay.classList.remove('show'); }
  if(toggle) toggle.addEventListener('click',function(){ sidebar.classList.toggle('open'); overlay.classList.toggle('show'); });
  if(overlay) overlay.addEventListener('click',closeNav);
  document.querySelectorAll('.sidebar a').forEach(function(a){
    a.addEventListener('click',function(){ if(window.innerWidth<992) closeNav(); });
  });
})();
</script>
</body>
</html>
<?php if(isset($db)) { $db->db_disconnect(); } ?>
