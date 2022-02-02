<?= $this->extend('/templates/user_dashboard'); ?>

<?= $this->section('content'); ?>

   <div class="container-fluid mt-4" style="padding-left: 320px; min-height: 700px;">
      <h3>Kelas Saya</h3>
      <p class="my-4">Upgrade terus ilmu dan pengalaman <br>terbaru kamu di bidang teknologi</p>
      <div class="myclass-category mb-5">
         <button id="button-active" class="btn btn-primary rounded-pill mr-2" data-status="active" onclick="buttonStatusClick(this)">Active</button>
         <button id="button-starter" class="btn btn-primary rounded-pill mr-2" data-status="starter" onclick="buttonStatusClick(this)">Starter</button>
         <button id="button-freemium" class="btn btn-primary rounded-pill mr-2" data-status="freemium" onclick="buttonStatusClick(this)">Freemium</button>
         <button id="button-premium" class="btn btn-primary rounded-pill mr-2" data-status="premium" onclick="buttonStatusClick(this)">Premium</button>
         <button id="button-finished" class="btn btn-primary rounded-pill mr-2" data-status="finished" onclick="buttonStatusClick(this)">Finished</button>
      </div>
      <img src="<?= base_url('img/misc/preloaders.gif') ?>" alt="" class="preloaders">
      <div class="myclass-list">
         <!-- List kelas with ajax -->
      </div>
   </div>

   <script>
      const btnActive = document.getElementById('button-active');
      $(document).ready(buttonStatusClick(btnActive));

      function buttonStatusClick(button) { 
         $('.btn').removeClass('active');
         button.classList.add('active');

         const status = button.dataset.status;
         
         $.ajax({
            type: "post",
            url: "<?= base_url('usrviewlogin/showkelaslist') ?>",
            data: {
               userId : <?= $user['id'] ?>,
               status : status
            },
            beforeSend: function () {
               $('.myclass-list, .pesan-status').hide();
               $('.preloaders').show();
            },
            // dataType: "json",
            success: function (response) {
               $('.myclass-list, .pesan-status').show();
               $('.myclass-list').html(response);
               $('.preloaders').hide();
            }
         });
      }
   </script>

<?= $this->endSection(); ?>
