# FileSubly - Version History


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.3.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Added
- **Custom Todo/Info Lists System**
  - Tab navigation with "Documents" as default tab plus custom lists
  - Admin users can create unlimited custom lists via ➕ button
  - Each list has checkbox column (Erledigt), priority column (Prio), and custom content columns
  - Inline editing: Double-click cells to edit text, click priority to change (0-3)
  - Visual priority highlighting with colored rows (red/yellow/blue) in web view
  - Add/delete rows with confirmation dialogs
  - Delete entire lists with confirmation
  - Tab persistence: Page stays on active list after any operation (add/edit/delete)
  - Permission-based UI: Admins see edit controls, regular users only see checkboxes

- **PDF Export for Custom Lists**
  - 📄 PDF button on each custom list
  - Professional A4 layout with full-width table utilization
  - Clean design optimized for grayscale printing
  - Automatic file saving to `files/` directory with Priority 1
  - Filename generated from list title (e.g., "Bestellliste_Neu_Ulm.pdf")
  - Overwrites existing PDFs without prompting
  - Modern styling with alternating row colors and proper spacing
  - Uses TCPDF library for native PDF generation

- **Backend Infrastructure**
  - `save_custom_list.php`: Full CRUD API with 7 actions (create_tab, add_row, toggle_checkbox, edit_cell, edit_priority, delete_row, delete_list)
  - `download_list_pdf.php`: PDF generation with TCPDF native methods (Cell/MultiCell)
  - `.custom_lists.json`: JSON storage for all custom lists data
  - CSRF protection on all AJAX endpoints
  - Permission checks: `manage_users` required for admin operations

- **TCPDF Integration**
  - Installed TCPDF 6.7.5 library in `lib/tcpdf/`
  - Custom PDF layout without default headers/footers
  - Automatic text wrapping in cells
  - Configurable column widths (Checkbox: 20mm, Prio: 15mm, Text: 145mm)

### Changed
- Updated `.gitignore` to exclude `lib/tcpdf/` and `.custom_lists.json`
- Modified `index.php` to replace "Dokumente" header with Bootstrap tab navigation (~300 lines added)
- Enhanced inline editing with hover effects and ESC to cancel

### Fixed
- JavaScript syntax error (removed orphaned alert code after PDF download function)
- Tab persistence: Users now stay on active list after reload/operations
- PDF checkbox rendering: Changed from Unicode symbols to `[ ]` for better print quality

### Technical Details
- **Data Structure**: JSON with tabs array, each tab containing id, title, columns, and rows
- **URL Parameters**: `?tab=list_id` for tab state persistence
- **Inline Editing**: contenteditable approach with input/select elements on demand
- **Priority Colors**: Reused existing CSS classes from file priority feature
- **Bootstrap Integration**: nav-tabs and tab-panes for UI consistency


## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors

## [1.0.2] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors
### Changes
- feat: Dynamic footer with version from VERSION file and GitHub link

## [1.0.1] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors

## [1.0.2] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors
### Changes
- feat: Dynamic footer with version from VERSION file and GitHub link
### Changes
- Initial Release - FileSubly 1.0
## [1.0.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors

## [1.0.2] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors
### Changes
- feat: Dynamic footer with version from VERSION file and GitHub link

## [1.0.1] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors

## [1.0.2] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors
### Changes
- feat: Dynamic footer with version from VERSION file and GitHub link
### Changes
- Initial Release - FileSubly 1.0
### ðŸŽ‰ Erstes stabiles Release


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors

## [1.0.2] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors
### Changes
- feat: Dynamic footer with version from VERSION file and GitHub link

## [1.0.1] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors

## [1.0.2] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors
### Changes
- feat: Dynamic footer with version from VERSION file and GitHub link
### Changes
- Initial Release - FileSubly 1.0
VollstÃ¤ndiges Dokumentenverwaltungs-System mit Benutzerverwaltung und Bibliotheks-Modul.

#### âœ¨ Features


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors

## [1.0.2] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors
### Changes
- feat: Dynamic footer with version from VERSION file and GitHub link

## [1.0.1] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors

## [1.0.2] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors
### Changes
- feat: Dynamic footer with version from VERSION file and GitHub link
### Changes
- Initial Release - FileSubly 1.0
**Sicherheit:**

- Rate Limiting fÃ¼r Login (5 Versuche, 15 Min Sperre)
- CSRF-Schutz fÃ¼r alle Formulare
- MIME-Type Validierung
- bcrypt Password-Hashing
- Notfall-Wiederherstellung (admin/admin Fallback)

**Benutzerverwaltung:**

- Granulare Berechtigungen (download, upload, delete, sort, merge, manage_users)
- Admin-Panel fÃ¼r User-CRUD
- Passwort-ZurÃ¼cksetzen mit Token
- Zugangsanfragen-System
- User-spezifische Statistiken

**Datei-Management:**

- Drag & Drop Upload
- Datei-Sortierung per Drag & Drop (persistent)
- PDF-Merge mit FPDI
- Download-Counter
- Ãœberschreiben-BestÃ¤tigung
- TastenkÃ¼rzel (ESC, Ctrl+U, Ctrl+M, Delete)

**Bibliothek-Modul (OOP):**

- Mehrere separate Bibliotheken
- Granulare Berechtigungen pro User pro Bibliothek
- OOP-Architektur (Library, LibraryManager)
- Admin-Panel fÃ¼r Library-CRUD
- JSON-basierte Datenhaltung
- Identische UI zum Hauptsystem

**UI/UX:**

- Responsive Bootstrap 5.3.3 Design
- Mobile-optimiert
- Auto-dismissable Alerts
- Loading-Overlay mit Animation
- Keyboard-Shortcuts Hilfe

#### ðŸ“š Dokumentation


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors

## [1.0.2] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors
### Changes
- feat: Dynamic footer with version from VERSION file and GitHub link

## [1.0.1] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors

## [1.0.2] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors
### Changes
- feat: Dynamic footer with version from VERSION file and GitHub link
### Changes
- Initial Release - FileSubly 1.0
- README.md - Ãœbersicht und Schnellstart
- INSTALL.md - Detaillierte Installationsanleitung
- docs/Bibliothek-Modul.md - OOP-Modul Dokumentation
- docs/Projekt-Uebersicht.md - Architektur-Entscheidungen
- docs/Roadmap-Entwicklung.md - Feature-Roadmap

#### ðŸ”§ Technisches


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors

## [1.0.2] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors
### Changes
- feat: Dynamic footer with version from VERSION file and GitHub link

## [1.0.1] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors

## [1.0.2] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors
### Changes
- feat: Dynamic footer with version from VERSION file and GitHub link
### Changes
- Initial Release - FileSubly 1.0
- PHP 7.4+ KompatibilitÃ¤t
- Dual-Architektur (Procedural + OOP)
- JSON-basierte Datenhaltung
- FPDF/FPDI fÃ¼r PDF-Manipulation
- Bootstrap 5.3.3
- Zentralisiertes User-Dropdown (DRY)

#### ðŸ“¦ Deployment


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors

## [1.0.2] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors
### Changes
- feat: Dynamic footer with version from VERSION file and GitHub link

## [1.0.1] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors

## [1.0.2] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors
### Changes
- feat: Dynamic footer with version from VERSION file and GitHub link
### Changes
- Initial Release - FileSubly 1.0
- .gitignore fÃ¼r sensible Daten
- Example-Templates (.example.json)
- .gitkeep fÃ¼r Ordnerstruktur
- Automatische Initialisierung

---

## ZukÃ¼nftige Versionen


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors

## [1.0.2] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors
### Changes
- feat: Dynamic footer with version from VERSION file and GitHub link

## [1.0.1] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors

## [1.0.2] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors
### Changes
- feat: Dynamic footer with version from VERSION file and GitHub link
### Changes
- Initial Release - FileSubly 1.0
### [1.1.0] - Geplant


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors

## [1.0.2] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors
### Changes
- feat: Dynamic footer with version from VERSION file and GitHub link

## [1.0.1] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors

## [1.0.2] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors
### Changes
- feat: Dynamic footer with version from VERSION file and GitHub link
### Changes
- Initial Release - FileSubly 1.0
- Bibliothek-Zugriff fÃ¼r normale User (nicht nur Admins)
- E-Mail-Benachrichtigungen
- Versionierung von Dateien
- Kommentar-System

### [2.0.0] - Geplant


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors

## [1.0.2] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors
### Changes
- feat: Dynamic footer with version from VERSION file and GitHub link

## [1.0.1] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors

## [1.0.2] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master

## [1.0.3] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files

## [1.0.4] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load

## [1.0.5] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality

## [1.1.0] - 2025-12-04


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting

## [1.1.1] - 2025-12-05


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export

## [1.2.0] - 2025-12-07


## [1.3.0] - 2025-12-07

### Changes
- feat: Add custom todo/info lists with tab navigation, inline editing, and PDF export
### Changes
- feat: Add file priority system with visual highlighting
### Changes
- fix: Add missing save_sort_order.php and fix drag-drop save functionality
### Changes
- perf: Replace Bootstrap CDN with local files for faster page load
### Changes
- feat: Add download feedback overlay to prevent multiple clicks on large files
### Changes
- feat: Add version info button in login and update GitHub links to /tree/master
### Changes
- fix: Use UTF-8 without BOM in version-bump script to prevent PHP errors
### Changes
- feat: Dynamic footer with version from VERSION file and GitHub link
### Changes
- Initial Release - FileSubly 1.0
- OOP-Refaktorierung des Hauptsystems
- Datenbank-Support (Optional)
- API-Endpoints
- Docker-Support
