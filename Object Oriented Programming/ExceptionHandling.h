#ifndef _EXCEPTION_HANDLING
#define _EXCEPTION_HANDLING

#include <stdexcept>
#include <string>

using namespace std;

class ExceptionHandling : public logic_error
{
public:
   ExceptionHandling(const string& message = "");
};
#endif
