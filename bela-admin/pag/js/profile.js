function alteraSenha()
{
    var confirma = confirm("Você realmente deseja alterar sua senha? Você será deslogado e redirecionado para outra página.");
    if(confirma == true)
    {
        return true;
    }
    else
    {
        return false;
    }
}