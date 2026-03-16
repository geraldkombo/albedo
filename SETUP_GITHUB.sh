#!/bin/bash
# ALBEDO GitHub Registration — run from project root in Termux
set -e

echo "ALBEDO — Setting up GitHub repository..."

git config --global user.name "Gerald Kombo"
git config --global init.defaultBranch main

git init
git checkout -b main
git add .
git commit -m "feat: ALBEDO initial commit — Kenya Carbon Intelligence Platform for E-Mobility

- Laravel 11 + MySQL 8 + TailwindCSS 3 + Leaflet.js + Chart.js + DOMPDF
- UNFCCC AMS-III.C v16.0 with IPCC Tier 1 baseline (CO2 + CH4 + N2O)
- KNCR 8-stage project lifecycle (NEMA compliance)
- EPRA Guidelines 2023 charging infrastructure compliance
- Carbon Markets Regulations 2024 benefit sharing (25%)
- 47 counties, 8 migrations, 8 models, 4 services

System Architect: Gerald Kombo"

gh repo create albedo \
    --private \
    --description "Kenya Carbon Intelligence Platform for E-Mobility" \
    --source=. \
    --push

gh repo edit \
    --add-topic "carbon-credits" \
    --add-topic "kenya" \
    --add-topic "e-mobility" \
    --add-topic "laravel" \
    --add-topic "unfccc" \
    --add-topic "ipcc" \
    --add-topic "climate-tech" \
    --add-topic "carbon-accounting"

gh repo edit --enable-issues --enable-projects --homepage "https://albedo.co.ke"

echo ""
echo "ALBEDO is live at https://github.com/geraldkombo/albedo"
echo "Run: gh repo view --web"
