# Contributing to ALBEDO

Internal team collaboration guide for the ALBEDO platform.

## Team

| Role | Responsibilities |
|---|---|
| System Architect | Methodology design, source validation, final approval (Gerald Kombo) |

## Git Workflow

### Branch Naming
```
type/ticket-number-short-description
```

Types: `feature`, `bugfix`, `hotfix`, `refactor`, `docs`

### Commit Messages
```
type: subject #ticket
```

Examples:
- `feat: add KNCR PDF generation endpoint #101`
- `fix: correct leakage deduction calculation #102`

## Code Standards

1. `declare(strict_types=1)` in all PHP files
2. PSR-12 compliance (4 spaces, braces on same line)
3. Type hints on all parameters and return types
4. Keep controllers thin — business logic in Services
5. All constants in `config/albedo.php` with source citations

## Source Authority Protocol

When adding new constants:
1. Identify official source (Tier 1-5)
2. Verify URL accessibility
3. Extract exact value (no rounding)
4. Add to `config/albedo.php` with source comment
5. Create PR with source documentation

## Database Rules

1. Never modify existing migrations — create new ones
2. Always include `down()` method
3. Use foreign keys for referential integrity
4. Index frequently queried columns
5. Comment complex columns

## Pull Request Checklist

- [ ] PSR-12 compliant
- [ ] `declare(strict_types=1)` included
- [ ] Tests pass (`php artisan test`)
- [ ] New constants have source citations
- [ ] Migration includes `down()` method
- [ ] No hardcoded values
