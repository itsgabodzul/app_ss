function updateClock() {
    const now = new Date();
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');
    const seconds = String(now.getSeconds()).padStart(2, '0');
    document.getElementById('time').textContent = `${hours}:${minutes}:${seconds}`;
  }
  
  // Actualizar cada segundo
  setInterval(updateClock, 1000);
  
  // Llamar inmediatamente para que no haya retraso inicial
  updateClock();
  