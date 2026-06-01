<div align="center">

# 🍲 Bucătarul de Serviciu

### Generator modern de rețete în limba română, pe baza ingredientelor pe care le ai deja în casă.

![PHP](https://img.shields.io/badge/PHP-8%2B-777BB4?style=for-the-badge&logo=php&logoColor=white)
![AI](https://img.shields.io/badge/AI-Puter.js-FFB000?style=for-the-badge&logo=openai&logoColor=black)
![Language](https://img.shields.io/badge/Limba-Rom%C3%A2n%C4%83-002B7F?style=for-the-badge)
![Responsive](https://img.shields.io/badge/Design-Responsive-2F7D57?style=for-the-badge)
![License](https://img.shields.io/badge/License-MIT-b3561c?style=for-the-badge)

<br>

**Bucătarul de Serviciu** este o aplicație web simplă, elegantă și utilă, creată pentru a genera rețete în română pornind de la ingredientele disponibile în casă.

Este gândită special pentru utilizatori obișnuiți, părinți sau persoane care vor explicații clare, pași simpli și rezultate rapide.

<br>

</div>

---

## ✨ Ce face aplicația

Aplicația permite introducerea ingredientelor disponibile, apoi folosește AI prin **Puter.js** pentru a genera o rețetă completă în limba română.

Rezultatul include:

- 🥕 ingrediente principale;
- 🧂 ingrediente de bază presupuse;
- 🛒 ingrediente care ar ajuta, dar nu sunt obligatorii;
- 🍳 ustensile necesare;
- 👨‍🍳 pași de preparare explicați clar;
- ⏱️ timp de pregătire și timp de gătire;
- ✅ cum îți dai seama că mâncarea este gata;
- 💡 sfaturi utile pentru părinți;
- ⚠️ atenționări de siguranță alimentară;
- 🖨️ opțiune de printare a rețetei.

---

## 🎯 Pentru cine este utilă

Această aplicație este potrivită pentru:

- familii care vor idei rapide de mâncare;
- părinți sau bunici care preferă explicații clare;
- persoane care nu vor să caute manual rețete;
- utilizatori care vor să gătească doar cu ce au deja în casă;
- proiecte personale, server local, mini-dashboard de bucătărie sau aplicație self-hosted.

---

## 🖼️ Preview

![Vizualizare Bucătarul de Serviciu](screenshot/info.png)

---

## 🚀 Funcționalități principale

| Funcție | Descriere |
|---|---|
| 📝 Introducere ingrediente | Scrii ingredientele disponibile în casă. |
| 🎛️ Preferințe rețetă | Alegi dificultatea, timpul, porțiile și stilul de mâncare. |
| ✅ Opțiuni speciale | Fără prăjeli, ușor de mestecat, cu sare puțină. |
| 🤖 Generare AI | Rețeta este generată automat în română. |
| 📦 Răspuns structurat | AI-ul returnează date în format JSON, apoi aplicația le afișează frumos. |
| 🖨️ Printare | Poți printa rețeta într-un format curat. |
| 📱 Responsive | Merge bine pe desktop, tabletă și telefon. |

---

## 🧰 Tehnologii folosite

- **PHP 8+** pentru fișierul principal și servirea paginii;
- **HTML5** pentru structură;
- **CSS3** pentru design modern și responsive;
- **JavaScript Vanilla** pentru logica din browser;
- **Puter.js** pentru apelarea modelului AI fără backend complicat;
- **JSON** pentru răspuns structurat de la AI.

---

## 📦 Instalare pe Ubuntu / Apache

### 1. Creează folderul aplicației

```bash
sudo mkdir -p /var/www/html/bucatar
```

### 2. Copiază fișierul aplicației

Dacă fișierul tău se numește `index.php`:

```bash
sudo cp index.php /var/www/html/bucatar/index.php
```

Sau editează direct:

```bash
sudo nano /var/www/html/bucatar/index.php
```

### 3. Setează permisiuni simple

```bash
sudo chown -R www-data:www-data /var/www/html/bucatar
sudo chmod -R 755 /var/www/html/bucatar
```

### 4. Deschide în browser

Local:

```txt
http://localhost/bucatar/
```

Din rețea:

```txt
http://IP-SERVER/bucatar/
```

---

## 🖥️ Instalare rapidă pe orice server PHP

Aplicația este formată dintr-un singur fișier PHP.

Ai nevoie doar de:

- server web cu PHP;
- conexiune la internet pentru încărcarea Puter.js;
- browser modern.

Nu ai nevoie de bază de date.
Nu ai nevoie de cheie API în PHP.

---

## ⚙️ Cum se folosește

1. Deschizi aplicația în browser.
2. Scrii ingredientele disponibile, de exemplu:

```txt
cartofi, ouă, ceapă, brânză, roșii
```

3. Completezi opțional preferințele:

```txt
să fie fără prăjeli, ușor de mestecat, potrivit pentru cină
```

4. Alegi:

- dificultatea;
- timpul disponibil;
- numărul de porții;
- stilul de mâncare.

5. Apeși **Generare rețeta**.
6. Primești rețeta completă, structurată și gata de printat.

---

## 🧠 Exemplu de rezultat generat

```txt
Titlu: Cartofi cu ouă și brânză la tigaie
Timp total: 30-35 minute
Porții: 2
Dificultate: Foarte ușor
```

Aplicația va afișa apoi ingredientele, pașii de preparare, sfaturile și atenționările într-un design modern.

---

## 🛡️ Observații importante

Aplicația folosește AI, deci rezultatele trebuie tratate ca sugestii culinare.

Verifică mereu:

- prospețimea ingredientelor;
- gătirea completă a cărnii, ouălor și peștelui;
- alergiile alimentare;
- cantitatea de sare, zahăr sau grăsimi, mai ales pentru persoane cu restricții alimentare.

---

## 🔐 Despre API și autentificare

Această variantă folosește **Puter.js** direct în browser.

Avantaje:

- nu pui chei API în codul PHP;
- nu ai nevoie de backend AI separat;
- aplicația rămâne simplă și ușor de găzduit.

În funcție de model și limitări, prima utilizare poate cere autentificare Puter în browser.

---

## 📁 Structură recomandată pentru GitHub

```txt
bucatarul-de-serviciu/
├── index.php
├── README.md
├── screenshots/
│   └── preview.png
└── LICENSE
```

---

## 🎨 Personalizare

Poți modifica rapid aplicația din secțiunea CSS:

```css
:root {
    --accent: #b3561c;
    --accent2: #f0a63b;
    --accent3: #2f7d57;
}
```

Idei de personalizare:

- schimbare culori;
- adăugare logo;
- adăugare fundal cu imagine;
- salvare rețete generate;
- export PDF;
- istoric rețete;
- mod întunecat / mod luminos.

---

## 🗺️ Roadmap

- [ ] Salvare rețete favorite;
- [ ] Export PDF;
- [ ] Istoric rețete generate;
- [ ] Mod offline cu rețete predefinite;
- [ ] Selector temă dark/light;
- [ ] Galerie cu imagini pentru rețete;
- [ ] Buton pentru copiere rețetă în clipboard.

---

## 🤝 Contribuții

Contribuțiile sunt binevenite.

Poți deschide un issue sau un pull request pentru:

- bug-uri;
- îmbunătățiri UI;
- optimizări JavaScript;
- traduceri;
- funcții noi.

---

## 📄 Licență

Acest proiect poate fi publicat sub licența **MIT**.

Poți folosi, modifica și distribui aplicația liber, păstrând mențiunea autorului dacă dorești.

---

<div align="center">

### 🍽️ Bucătarul de Serviciu

**Din ingrediente simple, idei bune de mâncare.**

<br>

Made with ❤️ în România

</div>
