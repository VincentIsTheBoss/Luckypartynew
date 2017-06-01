function verif ( )
{
    if ( document.inscription.nom.value == "" )
    {
        alert ( "Veuillez entrer votre prénom !" );
        valid = false;
return valid;
    }  if ( document.inscription.nom.length > 20 )
      {
          alert ( "Votre nom doit faire moins de 20 caractères" );
          valid = false;
  return valid;
      }

    if ( document.inscription.prenom.value == "" )
    {
        alert ( "Veuillez entrer votre prénom!" );
        valid = false;
return valid;
    }

    if ( document.inscription.pseudo.value == "" )
    {
        alert ( "Veuillez entrer votre pseudo !" );
        valid = false;
return valid;
    }
    if ( document.inscription.pseudo.length < 6 || document.inscription.pseudo.length > 16  )
    {
        alert ( "Votre pseudo doit être compris entre 6 et 16 caractères");
        valid = false;
return valid;
    }

    if ( document.inscription.sexe.value == "" )
    {
        alert ( "Veuillez choisir un genre !" );
        valid = false;
return valid;
    }
    if ( document.inscription.email.value == "" )
    {
        alert ( "Veuillez entrer votre adresse mail !" );
        valid = false;
    return valid;
        }
        if ( document.inscription.email.indexOf(@) === -1 )
        {
            alert ( "Votre adresse doit comporter un '@' " );
            valid = false;
        return valid;
            }
    if ( document.inscription.cp.length != 5 )
    {
        alert ( "Code postal invalide !" );
        valid = false;
    return valid;
    }
    if ( document.inscription.cp.value == "" )
    {
        alert ( "Veuillez entrer votre code postal !" );
        valid = false;
    return valid;
    }
    if ( document.inscription.ville.value == "" )
    {
        alert ( "Veuillez entrer votre ville !" );
        valid = false;
    return valid;
    }
    if ( document.inscription.pays.value.length == "" )
    {
        alert ( "Veuillez choisir votre pays !" );
        valid = false;
    return valid;
    }
    if ( document.inscription.date_naissance.value.length == "" )
    {
        alert ( "Veuillez entrer votre date de naissance !" );
        valid = false;
    return valid;
    }
    if ( document.inscription.pwd.value == "" )
    {
        alert ( "Veuillez entrer votre mot de passe !" );
        valid = false;
    return valid;
    }
    if ( document.inscription.pwd.length < 8 || document.inscription.pwd.length > 16 )
    {
        alert ( "Votre mot de passe doit être compris entre 8 et 16 caractères!" );
        valid = false;
    return valid;
    }
    if ( document.inscription.pwd2.value == "")
    {
        alert ( "Veuillez confirmer votre mot de passe !" );
        valid = false;
    return valid;
    }
    if ( document.inscription.pwd2.value. != document.inscription.pwd.value )
    {
        alert ( "Vos mots de passe ne sont pas identiques" );
        valid = false;
    return valid;
    }
    if ( document.inscription.captcha.value == "" )
    {
        alert ( "Veuillez entrer écrire les caractères que vous voyez dans le captcha !" );
        valid = false;
    return valid;
    }
}
