<!-- Modal -->
<div class="modal fade" id="modalProfile" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="container d-flex justify-content-center mt-5">
            <div class="container-profile">
                <div class="top-container"> <img src="<?= media();?>/images/AdminLTELogo.png"
                        class="img-fluid profile-image" width="70">
                    <div class="ml-3">
                        <h5 class="name"><?= $_SESSION['userData']['nombre']. $_SESSION['userData']['apellido'];   ?>
                        </h5>
                        <p class="mail"><?= $_SESSION['userData']['correo']; ?></p>
                    </div>
                </div>
                <div class="middle-container d-flex justify-content-between align-items-center mt-3 p-2">
                <p class="name"><span class="amount"><i class="fas fa-user"></i></span> Usuario: </p><?= $_SESSION['userData']['usuario']; ?>
                </div>
                <div class="middle-container d-flex justify-content-between align-items-center p-2">
                <p class="name"><span class="amount"><i class="fas fa-user"></i></span> Direccion: </p><?= $_SESSION['userData']['direccion']; ?>
                </div>
                <div class="middle-container d-flex justify-content-between align-items-center  p-2">
                <p class="name"><span class="amount"><i class="fas fa-user"></i></span> Telefono: </p><?= $_SESSION['userData']['telefono']; ?>
                </div>
               

                <div class="middle-container d-flex justify-content-between align-items-center mt-3 p-2 bg-light">
                        <span class="current-balance">Dinero en Caja</span> 
                        <span class="amount"><span class="dollar-sign">$</span>0</span> 
                </div>
            </div>
        </div>

    </div>
</div>