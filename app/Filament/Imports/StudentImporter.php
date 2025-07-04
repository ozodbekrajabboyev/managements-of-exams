<?php

namespace App\Filament\Imports;

use App\Models\Student;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class StudentImporter extends Importer
{
    protected static ?string $model = Student::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('full_name')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('sinf')
                ->requiredMapping()
                ->relationship()
                ->rules(['required']),
            ImportColumn::make('maktab')
                ->relationship()
                ->requiredMapping()
                ->rules(['required']),
        ];
    }


//    public function mapRecord(array $record): array
//    {
//        return [
//            'full_name' => $record['full_name'] ?? '',
//            'sinf_id' => $record['sinf'] ?? null, // resolved automatically by ->relationship()
//            'maktab_id' => auth()->user()->maktab_id, // inject current user's school
//        ];
//    }

    public function resolveRecord(): ?Student
    {
        // return Student::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Student();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your student import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
