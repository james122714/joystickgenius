<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pixel Play - Mundo Gamer</title>
    <link rel="icon" href="../../vista/multimedia/imagenes/logo.png" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../vista/css/pagina_principal.css">
</head>

<style>
    * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #0f0f23 0%, #1a1a3e 50%, #2d2d5f 100%);
            color: #ffffff;
            min-height: 100vh;
        }

        .header {
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            padding: 1rem 2rem;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 20px rgba(0, 255, 255, 0.1);
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 2rem;
            font-weight: bold;
            background: linear-gradient(45deg, #00ffff, #ff00ff);
            -webkit-text-fill-color: transparent;
            text-shadow: 0 0 30px rgba(0, 255, 255, 0.5);
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .nav-links a {
            color: #ffffff;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .nav-links a:hover {
            background: linear-gradient(45deg, #00ffff, #ff00ff);
            border-color: rgba(255, 255, 255, 0.3);
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.3);
        }

        .main-content {
            margin-top: 100px;
            padding: 2rem;
        }

        .hero {
            text-align: center;
            padding: 4rem 0;
            background: radial-gradient(circle at center, rgba(0, 255, 255, 0.1) 0%, transparent 70%);
            border-radius: 20px;
            margin-bottom: 3rem;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            background: linear-gradient(45deg, #00ffff, #ff00ff, #ffff00);
            -webkit-text-fill-color: transparent;
            animation: glow 2s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from {
                text-shadow: 0 0 20px rgba(0, 255, 255, 0.5);
            }

            to {
                text-shadow: 0 0 40px rgba(255, 0, 255, 0.5);
            }
        }

        .hero p {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .cta-button {
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            border: none;
            padding: 1rem 3rem;
            font-size: 1.2rem;
            border-radius: 50px;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(78, 205, 196, 0.3);
        }

        .cta-button:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(78, 205, 196, 0.5);
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin: 3rem 0;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            padding: 2rem;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #00ffff, #ff00ff);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            border-color: rgba(0, 255, 255, 0.3);
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #00ffff;
        }

        .ribbon-vip {
            position: absolute;
            top: 25px;
            right: -50px;
            background: linear-gradient(90deg, #ff4444 60%, #ffb347 100%);
            color: #fff;
            padding: 8px 50px;
            font-size: 1rem;
            font-weight: bold;
            transform: rotate(20deg);
            box-shadow: 0 2px 12px rgba(255, 68, 68, 0.2);
            z-index: 20;
            letter-spacing: 1px;
            border-radius: 8px;
            text-shadow: 0 2px 8px #c00;
        }

        .vip-section {
            position: relative;
            overflow: visible;
        }

        .vip-title {
            text-align: center;
            font-size: 2.5rem;
            color: #ffd700;
            margin-bottom: 2rem;
            text-shadow: 0 0 20px rgba(255, 215, 0, 0.5);
        }

        .vip-benefits {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .vip-benefit {
            background: rgba(255, 215, 0, 0.1);
            padding: 1.5rem;
            border-radius: 15px;
            border: 1px solid rgba(255, 215, 0, 0.3);
            text-align: center;
        }

        .status-section {
            margin: 3rem 0;
        }

        .status-title {
            font-size: 2rem;
            margin-bottom: 2rem;
            text-align: center;
            color: #ff6b6b;
        }

        .service-status {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .service-item {
            background: rgba(255, 255, 255, 0.05);
            padding: 1rem;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 1rem;
            border: 1px solid rgba(255, 107, 107, 0.3);
        }

        .status-banner {
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(90deg, #ff4444 60%, #ffb347 100%);
            color: #fff;
            font-size: 1.2rem;
            font-weight: bold;
            padding: 1rem 2rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            box-shadow: 0 2px 12px rgba(255, 68, 68, 0.2);
            text-shadow: 0 2px 8px #c00;
            gap: 1rem;
        }

        .status-banner .status-dot {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: #ff4444;
            box-shadow: 0 0 10px rgba(255, 68, 68, 0.5);
            animation: pulse 1.5s infinite;
        }

        .status-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #ff4444;
            box-shadow: 0 0 10px rgba(255, 68, 68, 0.5);
            animation: pulse 1.5s infinite;
        }

        @media (max-width: 768px) {
            .ribbon-vip {
                right: -20px;
                font-size: 0.9rem;
                padding: 6px 30px;
            }

            .status-banner {
                font-size: 1rem;
                padding: 0.7rem 1rem;
            }
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }

        .categories-section {
            margin: 3rem 0;
        }

        .section-title {
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 2rem;
            background: linear-gradient(45deg, #00ffff, #ff00ff);
            -webkit-text-fill-color: transparent;
        }

        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
        }

        .category-card {
            background: rgba(255, 255, 255, 0.08);
            padding: 2rem;
            border-radius: 15px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
            cursor: pointer;
        }

        .category-card:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-5px);
        }

        .info-buttons {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin: 3rem 0;
            flex-wrap: wrap;
        }

        .info-btn {
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(0, 255, 255, 0.3);
            padding: 1rem 2rem;
            border-radius: 25px;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .info-btn:hover {
            background: rgba(0, 255, 255, 0.2);
            border-color: rgba(0, 255, 255, 0.6);
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.3);
        }

        .footer {
            background: rgba(0, 0, 0, 0.8);
            padding: 3rem 2rem;
            text-align: center;
            margin-top: 5rem;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin: 2rem 0;
        }

        .social-links a {
            color: #00ffff;
            font-size: 1.5rem;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            color: #ff00ff;
            transform: scale(1.2);
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .info-buttons {
                flex-direction: column;
                align-items: center;
            }
        }
</style>

<body>
    <header class="header">
        <nav class="nav">
            <div class="logo">🎮 GameZone</div>
            <ul class="nav-links">
                <li><a href="#inicio">Inicio</a></li>
                <li><a href="#descargas">Descargas</a></li>
                <li><a href="#noticias">Noticias</a></li>
                <li>
                    <a href="#streams">Streams</a>
                </li>
                <li>
                    <a href="#vip">VIP</a>
                </li>
                <li><a href="#contacto">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <main class="main-content">
        <section class="hero">
            <h1>Bienvenido a GameZone</h1>
            <p>Tu destino definitivo para videojuegos, noticias, streams y contenido exclusivo</p>
            <button class="cta-button" onclick="scrollToSection('descargas')">Explorar Ahora</button>
        </section>

        <section class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">📥</div>
                <h3>Descargas Ilimitadas</h3>
                <p>Accede a miles de videojuegos de todas las categorías. Desde indies hasta AAA, tenemos todo lo que necesitas para tu biblioteca gaming.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">📰</div>
                <h3>Noticias Gaming</h3>
                <p>Mantente al día con las últimas noticias del mundo gaming. Reviews, lanzamientos, actualizaciones y todo lo que necesitas saber.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">🎬</div>
                <h3>Contenido Multimedia</h3>
                <p>Videos, trailers, gameplays y contenido exclusivo. Disfruta de la mejor experiencia audiovisual gaming.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">🚀</div>
                <h3>Actualizaciones Diarias</h3>
                <p>Contenido fresco todos los días. Nuevos juegos, parches, DLCs y actualizaciones constantes para que nunca te quedes sin opciones.</p>
            </div>
        </section>

        <section class="vip-section">
            <span class="ribbon-vip">Fuera de servicio por el momento</span>
            <h2 class="vip-title">✨ Membresía VIP Premium ✨</h2>
            <div class="vip-benefits">
                <div class="vip-benefit">
                    <h4>🔥 Acceso Anticipado</h4>
                    <p>Descarga juegos antes que nadie</p>
                </div>
                <div class="vip-benefit">
                    <h4>⚡ Velocidad Premium</h4>
                    <p>Descargas a máxima velocidad</p>
                </div>
                <div class="vip-benefit">
                    <h4>🎯 Sin Publicidad</h4>
                    <p>Experiencia libre de anuncios</p>
                </div>
                <div class="vip-benefit">
                    <h4>💎 Contenido Exclusivo</h4>
                    <p>Acceso a juegos premium únicos</p>
                </div>
                <div class="vip-benefit">
                    <h4>🛠️ Soporte Prioritario</h4>
                    <p>Asistencia 24/7 especializada</p>
                </div>
                <div class="vip-benefit">
                    <h4>🎪 Eventos Privados</h4>
                    <p>Torneos y eventos exclusivos</p>
                </div>
            </div>
        </section>

        <section class="categories-section">
            <h2 class="section-title">Categorías Populares</h2>
            <div class="categories-grid">
                <div class="category-card">
                    <h3>🔫 Acción</h3>
                    <p>1,250+ juegos</p>
                </div>
                <div class="category-card">
                    <h3>🏰 RPG</h3>
                    <p>890+ juegos</p>
                </div>
                <div class="category-card">
                    <h3>🏁 Carreras</h3>
                    <p>340+ juegos</p>
                </div>
                <div class="category-card">
                    <h3>⚽ Deportes</h3>
                    <p>280+ juegos</p>
                </div>
                <div class="category-card">
                    <h3>🧩 Estrategia</h3>
                    <p>520+ juegos</p>
                </div>
                <div class="category-card">
                    <h3>👻 Horror</h3>
                    <p>190+ juegos</p>
                </div>
                <div class="category-card">
                    <h3>🎨 Indie</h3>
                    <p>1,100+ juegos</p>
                </div>
                <div class="category-card">
                    <h3>🎯 Arcade</h3>
                    <p>670+ juegos</p>
                </div>
            </div>
        </section>

        <section class="status-section">
            <div class="status-banner">
                <div class="status-dot"></div>
                <span>Todos los servicios especiales están <b>fuera de servicio por el momento</b>. ¡Pronto estarán disponibles!</span>
            </div>
            <h2 class="status-title">🔴 Estado de Servicios</h2>
            <div class="service-status">
                <div class="service-item">
                    <div class="status-dot"></div>
                    <span>Streams en Vivo - Fuera de Servicio</span>
                </div>
                <div class="service-item">
                    <div class="status-dot"></div>
                    <span>Chat VIP - Fuera de Servicio</span>
                </div>
                <div class="service-item">
                    <div class="status-dot"></div>
                    <span>Torneos Online - Fuera de Servicio</span>
                </div>
                <div class="service-item">
                    <div class="status-dot"></div>
                    <span>Streaming Premium - Fuera de Servicio</span>
                </div>
                <div class="service-item">
                    <div class="status-dot"></div>
                    <span>Modo Espectador VIP - Fuera de Servicio</span>
                </div>
                <div class="service-item">
                    <div class="status-dot"></div>
                    <span>Salas Privadas - Fuera de Servicio</span>
                </div>
            </div>
        </section>

        <section class="info-buttons">
            <a href="#" class="info-btn" onclick="showInfo('requisitos')">📋 Requisitos del Sistema</a>
            <a href="#" class="info-btn" onclick="showInfo('guias')">📖 Guías de Instalación</a>
            <a href="#" class="info-btn" onclick="showInfo('faq')">❓ Preguntas Frecuentes</a>
            <a href="#" class="info-btn" onclick="showInfo('soporte')">🛠️ Soporte Técnico</a>
            <a href="#" class="info-btn" onclick="showInfo('comunidad')">👥 Comunidad</a>
            <a href="#" class="info-btn" onclick="showInfo('politicas')">📜 Políticas y Términos</a>
        </section>
    </main>

    <footer class="footer">
        <div class="footer-content">
            <h3>GameZone - Tu Portal Gaming Definitivo</h3>
            <p>Conectando gamers desde 2024. Miles de juegos, noticias frescas y una comunidad apasionada.</p>

            <div class="social-links">
                <a href="#" title="Discord">💬</a>
                <a href="#" title="Twitter">🐦</a>
                <a href="#" title="YouTube">📺</a>
                <a href="#" title="Twitch">🎮</a>
                <a href="#" title="Instagram">📸</a>
            </div>

            <p>&copy; 2024 GameZone. Todos los derechos reservados. | Hecho con ❤️ para gamers</p>
        </div>
    </footer>

    <script>
        function scrollToSection(sectionId) {
            const element = document.getElementById(sectionId);
            if (element) {
                element.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        }

        function showInfo(type) {
            const messages = {
                requisitos: '📋 Requisitos del Sistema:\n\n• Windows 10/11 (64-bit)\n• 8GB RAM mínimo\n• DirectX 12 compatible\n• 50GB espacio libre\n• Conexión a internet estable',
                guias: '📖 Guías de Instalación:\n\n• Descarga completa antes de instalar\n• Desactiva antivirus temporalmente\n• Ejecuta como administrador\n• Sigue las instrucciones paso a paso\n• Reinicia después de instalar',
                faq: '❓ Preguntas Frecuentes:\n\n• ¿Los juegos incluyen actualizaciones?\n• ¿Hay soporte multijugador?\n• ¿Cómo reporto errores?\n• ¿Puedo solicitar juegos específicos?\n• ¿Hay límites de descarga?',
                soporte: '🛠️ Soporte Técnico:\n\n• Chat en vivo 24/7\n• Tickets de soporte prioritario\n• Base de conocimientos\n• Tutoriales en video\n• Foro de la comunidad',
                comunidad: '👥 Comunidad GameZone:\n\n• +500K miembros activos\n• Discord oficial\n• Torneos semanales\n• Intercambio de estrategias\n• Reviews de la comunidad',
                politicas: '📜 Políticas y Términos:\n\n• Uso responsable de la plataforma\n• Respeto entre usuarios\n• Prohibido contenido ilegal\n• Política de privacidad\n• Términos de servicio VIP'
            };

            alert(messages[type]);
        }

        // Efectos adicionales de interactividad
        document.addEventListener('DOMContentLoaded', function() {
            // Animación de las cards al hacer scroll
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            });

            // Aplicar animaciones a elementos
            document.querySelectorAll('.feature-card, .category-card').forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(50px)';
                card.style.transition = 'all 0.6s ease';
                observer.observe(card);
            });
        });

        // Efectos de partículas en el fondo (opcional)
        function createParticle() {
            const particle = document.createElement('div');
            particle.style.position = 'fixed';
            particle.style.width = '4px';
            particle.style.height = '4px';
            particle.style.background = '#00ffff';
            particle.style.borderRadius = '50%';
            particle.style.pointerEvents = 'none';
            particle.style.opacity = '0.7';
            particle.style.left = Math.random() * window.innerWidth + 'px';
            particle.style.top = window.innerHeight + 'px';
            particle.style.zIndex = '1';

            document.body.appendChild(particle);

            const animation = particle.animate([{
                    transform: 'translateY(0)',
                    opacity: 0.7
                },
                {
                    transform: `translateY(-${window.innerHeight + 100}px)`,
                    opacity: 0
                }
            ], {
                duration: 3000 + Math.random() * 2000,
                easing: 'linear'
            });

            animation.onfinish = () => particle.remove();
        }

        // Crear partículas ocasionalmente
        setInterval(createParticle, 300);
    </script>
</body>

</html>