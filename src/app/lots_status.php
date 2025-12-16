<?php

namespace app;

enum lots_status: string
{
    case Started = "started";
    case Awaiting = "awaiting";
    case Finished = "finished";
}
