<?php

declare(strict_types = 1);

namespace CodelyTv\Context\Backoffice\Module\Course\Domain;

interface CourseRepository
{
    public function save(Course $course);
}