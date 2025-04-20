export async function badgeModule() {
  // Tworzenie elementu plakietki
  const badge = document.createElement('div');
  badge.id = 'madeWithSSBF';
  badge.textContent = 'Made with SSBF';

  // Style plakietki
  const style = document.createElement('style');
  style.textContent = `
    #madeWithSSBF {
      position: fixed;
      bottom: 30px;
      right: 30px;
      background-color: #007bff;
      color: white;
      padding: 20px 30px;
      font-size: 18px;
      font-weight: bold;
      border-radius: 40px;
      cursor: pointer;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      transition: background-color 0.3s ease, transform 0.3s ease;
      z-index: 9999;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      letter-spacing: 1px;
    }

    #madeWithSSBF:hover {
      background-color: #0056b3;
      transform: scale(1.1); /* Powiększenie plakietki przy najechaniu */
    }

    #madeWithSSBF:active {
      transform: scale(0.95); /* Efekt kliknięcia */
    }

    #madeWithSSBF::after {
      content: '';
      display: block;
      position: absolute;
      bottom: -10px;
      right: -10px;
      width: 30px;
      height: 30px;
      background-color: #ffffff;
      border-radius: 50%;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }
  `;

  // Dodanie stylu do strony
  document.head.appendChild(style);

  // Funkcja przekierowania po kliknięciu plakietki
  badge.addEventListener('click', function() {
    window.location.href = 'https://github.com/MrDevelop636/SSBF-Framework'; // Zamień na odpowiednią stronę
  });

  // Dodanie plakietki do body
  document.body.appendChild(badge);
}
