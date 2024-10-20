# Changelog

## v5.x to v6.x

### New features

- The bindings are configured using container services.

### Backward Incompatible Changes

- The prototype methods for `Appliation` have been removed: `lazy_get_cldr_cache`, `lazy_get_cldr_provider`, `lazy_get_cldr`. They've been replaced by the `Repository` service.
- The prototype methods for `Appliation` have been removed: `get_locale`, `set_locale`, `get_language`. They've been replaced by the `CurrentLocale` service.

### Deprecated Features

### Other Changes
