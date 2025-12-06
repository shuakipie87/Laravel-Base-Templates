# Architectural Decisions

## Authentication & Authorization
We use a hybrid approach:
- **Laravel Sanctum**: Used for the primary SPA authentication (Inertia) and mobile API access.
- **Laravel Passport**: Included as a dependency if full OAuth2 server capabilities (Client Credentials Grant) are needed in the future, but Sanctum is the default driver in `auth.php`.
- **Spatie Permissions**: We implemented a hierarchical Role-Based Access Control system. Permissions are granular (e.g., `edit articles`), while Roles (e.g., `Manager`) group these permissions. The `Super Admin` role bypasses checks via a `Gate::before` interceptor in `AppServiceProvider`.

## Frontend Stack
- **Inertia.js**: Connects Laravel and Vue.js, allowing us to build a modern SPA without the complexity of a separate API-only backend for the frontend.
- **Vue 3 (Composition API)**: Modern, reactive UI components.
- **Tailwind CSS**: Utility-first CSS for rapid styling.

## Database & Queue
- **MySQL**: Standard relational storage.
- **Redis**: Used for Cache, Session, and Queues (Horizon ready). This ensures high performance for job processing and transient data storage.

## Docker Structure
We utilize a custom Docker setup (compatible with Sail) but defined explicitly in `docker-compose.yml` to ensure service stability. Service names (`database`, `redis`) are hardcoded in the `.env` to match the container names.