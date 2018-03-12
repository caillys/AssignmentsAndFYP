#include "ExceptionHandling.h"

ExceptionHandling::ExceptionHandling(const string& message): logic_error("Precondition Violated Exception: " + message)
{
}
