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
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }
        
        .contact-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: start;
        }
        
        .intro-section {
            padding: 40px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }
        
        .intro-section h1 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 20px;
            font-weight: 700;
        }
        
        .intro-section .subtitle {
            font-size: 1.2rem;
            color: #666;
            margin-bottom: 30px;
            font-weight: 400;
        }
        
        .intro-text {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #555;
            margin-bottom: 30px;
        }
        
        .wave-decoration {
            height: 60px;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none"><path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" fill="%23ED6237" fill-opacity="0.3"/></svg>') repeat-x;
            background-size: 1200px 60px;
            margin: 20px 0;
        }
        
        .form-container {
            background: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
            font-size: 0.95rem;
        }
        
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 15px;
            border: 2px solid #e1e1e1;
            border-radius: 12px;
            font-size: 16px;
            box-sizing: border-box;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.8);
        }
        
        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #ED6237;
            box-shadow: 0 0 0 3px rgba(237, 98, 55, 0.1);
            transform: translateY(-2px);
        }
        
        .form-group textarea {
            height: 120px;
            resize: vertical;
        }
        
        .submit-btn {
            background: linear-gradient(135deg, #ED6237 0%, #ff8a65 100%);
            color: white;
            padding: 15px 40px;
            border: none;
            border-radius: 50px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(237, 98, 55, 0.3);
            position: relative;
            overflow: hidden;
        }
        
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(237, 98, 55, 0.4);
        }
        
        .submit-btn:active {
            transform: translateY(0);
        }
        
        .message {
            padding: 15px 20px;
            margin-bottom: 25px;
            border-radius: 12px;
            font-weight: 500;
        }
        
        .success {
            background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .error {
            background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .debug {
            background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
            color: #856404;
            border: 1px solid #ffeaa7;
            font-family: monospace;
            font-size: 12px;
        }
        
        .required {
            color: #ED6237;
            font-weight: bold;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .contact-container {
                grid-template-columns: 1fr;
                gap: 30px;
                padding: 20px;
            }
            
            .intro-section,
            .form-container {
                padding: 30px;
            }
            
            .intro-section h1 {
                font-size: 2rem;
            }
        }
        
        @media (max-width: 480px) {
            .intro-section,
            .form-container {
                padding: 20px;
            }
            
            .intro-section h1 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="menu-container">
            <a class="menu-toggle">MENU</a>
            <div class="menu-items">
                <a href="index.html">ACCUEIL</a>
                <a href="realisations.html">REALISATIONS</a>
                <a href="apropos.html">A PROPOS</a>
                <a href="#" class="active">CONTACT</a>
            </div>
        </div>
    </header>
    
    <div class="contact-container">
        <!-- Section d'introduction à gauche -->
        <div class="intro-section">
            <h1>Un projet ?</h1>
            <p class="subtitle">Des questions ? Contactez-moi !</p>
            
            <div class="wave-decoration"></div>
            
            <div class="intro-text">
                <p>Chaque histoire commence par une communication engageante. Vous souhaitez écrire la vôtre ?</p>
                
                <p><strong>Racontez-moi votre idée</strong><br>
                Partagez votre vision, je vous aide à la concrétiser.</p>
            </div>
        </div>
        
        <!-- Formulaire à droite -->
        <div class="form-container">
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
                    <label for="nom">Nom et prénom<span class="required">*</span></label>
                    <input type="text" id="nom" name="nom" value="<?php echo isset($nom) ? $nom : ''; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Adresse email<span class="required">*</span></label>
                    <input type="email" id="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="sujet">Sujet<span class="required">*</span></label>
                    <input type="text" id="sujet" name="sujet" value="<?php echo isset($sujet) ? $sujet : ''; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="message">Message<span class="required">*</span></label>
                    <textarea id="message" name="message" required><?php echo isset($message_contenu) ? $message_contenu : ''; ?></textarea>
                </div>
                
                <button type="submit" class="submit-btn">Envoyer le message</button>
            </form>
        </div>
    </div>
</body>
</html>