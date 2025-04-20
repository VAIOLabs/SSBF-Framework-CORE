window.onload = () => {
  if (window.lucide) {
    lucide.createIcons();
  } else {
    console.error("Lucide nie jest dostępne");
  }
};
