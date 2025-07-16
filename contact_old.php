<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Delieux - Contact</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 5vw;
        }
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: 0 auto;
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"], input[type="email"], textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }
        textarea {
            height: 120px;
            resize: vertical;
        }
        button {
            background-color: #ED6237;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color:#333333;
        }
        .message {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .debug {
            background-color: #fff3cd;
            color: #856404;
            border: 1px solid #ffeaa7;
            font-family: monospace;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <header>
        <div class="menu-container">
        <a class="menu-toggle">MENU</a>
        <div class="menu-items">
            <a href="index.html" class="active">ACCUEIL</a>
            <a href="realisations.html">REALISATIONS</a>
            <a>A PROPOS</a>
            <a href="#"  class="active">CONTACT</a>
        </div>
        </div>
    </header>
    <div class="form-container">
        <h1>Contactez-moi</h1>
        
        <?php
        // ===== CONFIGURATION MAILTRAP =====
        // IMPORTANT : Remplacez ces valeurs par vos vraies informations Mailtrap
        $smtp_host = 'sandbox.smtp.mailtrap.io';  // Pour les tests
        $smtp_port = 2525;  // Port standard Mailtrap
        $smtp_username = '6e1a15ac248a09';
        $smtp_password = 'e8ca2bcb98d34f';
        
        // Email de destination
        $destinataire = 'tomgrand333@gmail.com';
        
        // Variables pour les messages
        $message = '';
        $message_type = '';
        $debug_info = '';
        
        // Fonction d'envoi d'email améliorée avec gestion d'erreurs
        function envoyerEmailMailtrap($host, $port, $username, $password, $destinataire, $expediteur, $nom_expediteur, $sujet, $corps) {
            $debug = [];
            
            try {
                // Connexion au serveur SMTP
                $debug[] = "Tentative de connexion à $host:$port";
                $socket = fsockopen($host, $port, $errno, $errstr, 30);
                
                if (!$socket) {
                    $debug[] = "ERREUR: Impossible de se connecter - $errstr ($errno)";
                    return ['success' => false, 'debug' => $debug];
                }
                
                $debug[] = "Connexion établie";
                
                // Fonction pour lire la réponse du serveur
                function lireReponse($socket) {
                    $response = '';
                    while ($line = fgets($socket, 512)) {
                        $response .= $line;
                        if (substr($line, 3, 1) == ' ') break;
                    }
                    return trim($response);
                }
                
                // Fonction pour envoyer une commande
                function envoyerCommande($socket, $commande) {
                    fputs($socket, $commande . "\r\n");
                    return lireReponse($socket);
                }
                
                // Séquence SMTP
                $response = lireReponse($socket);
                $debug[] = "Bienvenue: $response";
                
                $response = envoyerCommande($socket, "EHLO localhost");
                $debug[] = "EHLO: $response";
                
                // Authentification
                $response = envoyerCommande($socket, "AUTH LOGIN");
                $debug[] = "AUTH LOGIN: $response";
                
                $response = envoyerCommande($socket, base64_encode($username));
                $debug[] = "Username: $response";
                
                $response = envoyerCommande($socket, base64_encode($password));
                $debug[] = "Password: $response";
                
                // Vérifier si l'authentification a réussi
                if (strpos($response, '235') !== 0) {
                    $debug[] = "ERREUR: Authentification échouée";
                    fclose($socket);
                    return ['success' => false, 'debug' => $debug];
                }
                
                // Envoi de l'email
                $response = envoyerCommande($socket, "MAIL FROM:<$expediteur>");
                $debug[] = "MAIL FROM: $response";
                
                $response = envoyerCommande($socket, "RCPT TO:<$destinataire>");
                $debug[] = "RCPT TO: $response";
                
                $response = envoyerCommande($socket, "DATA");
                $debug[] = "DATA: $response";
                
                // En-têtes de l'email
                $headers = "From: $nom_expediteur <$expediteur>\r\n";
                $headers .= "Reply-To: $expediteur\r\n";
                $headers .= "Subject: $sujet\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                $headers .= "\r\n";
                
                // Envoi du contenu
                fputs($socket, $headers . $corps . "\r\n.\r\n");
                $response = lireReponse($socket);
                $debug[] = "Message envoyé: $response";
                
                // Fermeture
                envoyerCommande($socket, "QUIT");
                fclose($socket);
                
                $debug[] = "Connexion fermée";
                
                return ['success' => true, 'debug' => $debug];
                
            } catch (Exception $e) {
                $debug[] = "EXCEPTION: " . $e->getMessage();
                return ['success' => false, 'debug' => $debug];
            }
        }
        
        // Traitement du formulaire
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Récupération et validation des données
            $nom = htmlspecialchars(trim($_POST['nom']));
            $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
            $sujet = htmlspecialchars(trim($_POST['sujet']));
            $message_contenu = htmlspecialchars(trim($_POST['message']));
            
            // Validation
            if (empty($nom) || empty($email) || empty($sujet) || empty($message_contenu)) {
                $message = 'Tous les champs sont obligatoires.';
                $message_type = 'error';
            } elseif (!$email) {
                $message = 'Adresse email invalide.';
                $message_type = 'error';
            } else {
                // Vérifier la configuration
                if ($smtp_username === 'VOTRE_USERNAME_MAILTRAP' || $smtp_password === 'VOTRE_PASSWORD_MAILTRAP') {
                    $message = 'ERREUR DE CONFIGURATION: Vous devez remplacer les identifiants Mailtrap dans le code.';
                    $message_type = 'error';
                } else {
                    // Préparation du contenu de l'email
                    $corps_email = "
                    <html>
                    <head>
                        <style>
                            body { font-family: Arial, sans-serif; }
                            .container { max-width: 600px; margin: 0 auto; }
                            .header { background-color: #007cba; color: white; padding: 20px; text-align: center; }
                            .content { padding: 20px; }
                            .info { background-color: #f8f9fa; padding: 15px; margin: 10px 0; border-radius: 5px; }
                        </style>
                    </head>
                    <body>
                        <div class='container'>
                            <div class='header'>
                                <h2>Nouveau message de contact</h2>
                            </div>
                            <div class='content'>
                                <div class='info'>
                                    <strong>Nom:</strong> $nom<br>
                                    <strong>Email:</strong> $email<br>
                                    <strong>Sujet:</strong> $sujet
                                </div>
                                <h3>Message:</h3>
                                <p>" . nl2br($message_contenu) . "</p>
                            </div>
                        </div>
                    </body>
                    </html>";
                    
                    // Tentative d'envoi
                    $resultat = envoyerEmailMailtrap($smtp_host, $smtp_port, $smtp_username, $smtp_password, $destinataire, $email, $nom, $sujet, $corps_email);
                    
                    if ($resultat['success']) {
                        $message = 'Votre message a été envoyé avec succès !';
                        $message_type = 'success';
                        // Réinitialiser le formulaire
                        $nom = $email = $sujet = $message_contenu = '';
                    } else {
                        $message = 'Erreur lors de l\'envoi du message. Voir les détails ci-dessous.';
                        $message_type = 'error';
                    }
                    
                    // Afficher les informations de débogage
                    $debug_info = implode('<br>', $resultat['debug']);
                }
            }
        }
        ?>
        
        <?php if ($message): ?>
            <div class="message <?php echo $message_type; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        
        <?php if ($debug_info): ?>
            <div class="message debug">
                <strong>Informations de débogage:</strong><br>
                <?php echo $debug_info; ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="nom">Nom complet<span style="color: #ED6237">*</span></label>
                <input type="text" id="nom" name="nom" value="<?php echo isset($nom) ? $nom : ''; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="email">Adresse email<span style="color: #ED6237">*</span></label>
                <input type="email" id="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="sujet">Sujet<span style="color: #ED6237">*</span></label>
                <input type="text" id="sujet" name="sujet" value="<?php echo isset($sujet) ? $sujet : ''; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="message">Message<span style="color: #ED6237">*</span></label>
                <textarea id="message" name="message" required><?php echo isset($message_contenu) ? $message_contenu : ''; ?></textarea>
            </div>
            
            <button type="submit">Envoyer le message</button>
        </form>
    </div>
</body>
</html>