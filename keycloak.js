function redirectToKeycloakLogin() {
    window.location.href = 'http://localhost:8080/auth/realms/testingphp/protocol/openid-connect/auth?client_id=phps&redirect_uri=http://localhost:8090/login&response_type=code&scope=openid';
}

document.getElementById('keycloakLoginForm').addEventListener('submit', function (event) {
    event.preventDefault();
    redirectToKeycloakLogin();
});