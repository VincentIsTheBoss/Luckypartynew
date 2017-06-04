<label for="file" class="label-file">Choisir une image</label>
                <input enctype="multipart/form-data" id="file" class="input-file" type="file" name="avatar">
                <?php
                        
                        if (isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
                            $sizeMax = 2000000;
                            $extensionAccepted = array('jpg','jpeg','gif','png');
                            if ($_FILES['avatar']['size']<= $sizeMax) {
                                $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
                                if (in_array($extensionUpload, $extensionAccepted)) {
                                    $location = "userAvatar/".$_SESSION['id'].".".$extensionUpload;
                                    $result = move_uploaded_file($_FILES['avatar']['tmp_name'], $location);
                                    if ($result) {
                                        $db = dbConnect();
                                        $updateAvatar = $db->prepare('UPDATE utilisateur SET avatar =:avatar WHERE id = :id');
                                        $updateAvatar->execute(array(
                                            'avatar' => $_SESSION['id'].".".$extensionUpload,
                                            'id' => $_SESSION['id']
                                        ));
                                        header("Location:profil.php");

                                    }else{?>
                                    <div class="alert alert-danger" role="alert">Une erreur est survenue !
                                    </div>
                            <?php
                                    }

                                }else{?>
                                    <div class="alert alert-danger" role="alert">Votre photo de profil doit être au format jpg, jpeg, gif ou png !
                                    </div>
                        <?php
                                }
                            }
                            else{?>
                                    <div class="alert alert-danger" role="alert">Votre photo de profil ne doit pas dépasser 2 Mo !
                                    </div>
                    <?php
                            }
                        }

                    ?>