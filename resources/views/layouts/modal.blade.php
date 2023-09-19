<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="authModalLabel">Вхід</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="alert alert-danger dismissible" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                    </button>
                </div>

                <!-- Форма входу -->
                <form action="#" onsubmit="return false" method="POST" class="auth-form login-form active">
                    @csrf
                    <div class="input-group  mb-3">
                        <input type="text" name="email" class="form-control" placeholder="Пошта">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-4">
                        <input type="password" name="password" class="form-control" placeholder="Пароль">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="button" id="loginBtn" class="btn btn-warning btn-block">Вхід</button>
                    </div>
                </form>

                <!-- Форма реєстрації -->
                <form action="#" onsubmit="return false" method="POST" class="auth-form register-form">
                    @csrf
                    <div class="input-group  mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Пошта">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-4">
                        <input type="password" name="password" class="form-control" placeholder="Пароль">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-4">
                        <input type="password" name="confirm_password" class="form-control" placeholder="Підтвердження пароля">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="button" id="registerBtn" class="btn btn-warning btn-block">Реєстрація</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
                <button type="button" class="btn btn-primary" id="showLogin">Вхід</button>
                <button type="button" class="btn btn-success" id="showRegister">Реєстрація</button>
                <button type="submit" class="btn btn-primary" id="loginBtn" style="display:none;">Увійти</button>
                <button type="submit" class="btn btn-success" id="registerBtn" style="display:none;">Зареєструватися</button>
            </div>
        </div>
    </div>
</div>
