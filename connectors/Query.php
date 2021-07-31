<?php 
    class signIn{
        public function readSignin($email, $pass) :string{
            require '../connectors/connection.php';
            $sql = 'SELECT * FROM registers WHERE email=:email AND password=:pass';
        
                    
                $statement = $connection->prepare($sql);
                $statement->execute([':email' => $email, ':pass' => $pass]);

                $user = $statement->fetch(PDO::FETCH_OBJ);

                if (!$user) {
                    return 'Login failed.';
                } else 
                    {   
                        session_start();
                        $_SESSION["user_id"] = $user->user_id;
                        $_SESSION["name"] = $user->name;
                        header("Location: Header.php");
                        exit;
                }
            }

    
        }
    
?>