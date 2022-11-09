// Monitora cliques no botão da senha e executa 'togglePass':
$('#pwToggle').click(togglePass);
// Exibe/oculta a senha:
function togglePass() {
    // Se a senha é do tipo 'password'...
    if($('#password').attr('type') == 'password'){
        // Muda para o tipo 'text':
        $('#password').attr('type', 'text');
        // Troca o ícone:
        $('#pwToggle i').removeClass('fa-eye');
        $('#pwToggle i').addClass('fa-eye-slash');
        // Se a senha é do tipo 'text':
    } else {
        // Muda para o tipo 'password':
        $('#password').attr('type', 'password');
        // Troca o ícone:
        $('#pwToggle i').removeClass('fa-eye-slash');
        $('#pwToggle i').addClass('fa-eye');
    }
}