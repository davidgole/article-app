# article-app

Ta aplikacija omogoča prijavljenim uporabnikom objavljanje člankov, njihovo urejanje ali brisanje, ter urejanje svojega profila.

## Zahteve

- PHP 7.4 ali novejši
- MySQL 5.7 ali novejši
- [Laragon](https://laragon.org/) ali katerikoli drug lokalni razvojni strežnik

## Namestitev

### 1. Prenos projekta

Najprej prenesite projekt iz repozitorija:

```bash
git clone https://github.com/davidgole/article-app.git
cd article-app
```

### 2. MySQL strežnik

Prepričajte se, da imate nameščen in zagnan MySQL strežnik. Ustvarite novo podatkovno bazo, tako da zaženete datoteko 'news.sql':
```sql
CREATE DATABASE news;
mysql -u root -p news < news.sql
```

### 3. Zagon strežnika

Če uporabljate Laragon, preprosto povlecite mapo projekta v Laragon in kliknite na "Start All". Druga možnost je, da uporabite vgrajen PHP strežnik:
```bash
php -S localhost:8000
```

## Avtor
- David Gole
- Email: [2002.gole@gmail.com](mailto:2002.gole@gmail.com)
- GitHub: [davidgole](https://github.com/davidgole)
